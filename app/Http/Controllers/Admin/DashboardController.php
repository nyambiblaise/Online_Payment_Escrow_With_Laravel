<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload;
use App\Models\Escrow;
use App\Models\Fund;
use App\Models\Gateway;
use App\Models\PayoutLog;
use App\Models\Subscriber;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\User;
use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Purify\Facades\Purify;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    use Upload;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function dashboard()
    {


        $data['funding'] = collect(Fund::selectRaw('SUM(CASE WHEN status = 1 THEN amount END) AS totalAmountReceived')
            ->selectRaw('SUM(CASE WHEN status = 1 THEN charge END) AS totalChargeReceived')
            ->selectRaw('SUM((CASE WHEN created_at >= CURDATE() AND status = 1 THEN amount END)) AS todayDeposit')
            ->get()->toArray())->collapse();

        $data['userRecord'] = collect(User::selectRaw('COUNT(id) AS totalUser')
            ->selectRaw('count(CASE WHEN status = 1  THEN id END) AS activeUser')
            ->selectRaw('SUM(balance) AS totalUserBalance')
            ->selectRaw('COUNT((CASE WHEN created_at >= CURDATE()  THEN id END)) AS todayJoin')
            ->get()->makeHidden(['fullname', 'mobile'])->toArray())->collapse();


        $data['tickets'] = collect(Ticket::where('created_at', '>', Carbon::now()->subDays(30))
            ->selectRaw('count(CASE WHEN status = 3  THEN status END) AS closed')
            ->selectRaw('count(CASE WHEN status = 2  THEN status END) AS replied')
            ->selectRaw('count(CASE WHEN status = 1  THEN status END) AS answered')
            ->selectRaw('count(CASE WHEN status = 0  THEN status END) AS pending')
            ->get()->toArray())->collapse();


        $dailyDeposit = $this->dayList();
        Fund::whereMonth('created_at', Carbon::now()->month)
            ->select(
                DB::raw('sum(amount) as totalAmount'),
                DB::raw('DATE_FORMAT(created_at,"Day %d") as date')
            )
            ->where('status', 1)
            ->groupBy(DB::raw("DATE(created_at)"))
            ->get()->map(function ($item) use ($dailyDeposit) {
                $dailyDeposit->put($item['date'], round($item['totalAmount'], 2));
            });
        $statistics['deposit'] = $dailyDeposit;


        $dailyEscrow = $this->dayList();

        Escrow::whereMonth('created_at', Carbon::now()->month)
            ->select(
                DB::raw('sum(amount) as totalAmount'),
                DB::raw('DATE_FORMAT(created_at,"Day %d") as date')
            )
            ->whereIn('status', [0, 1])
            ->groupBy(DB::raw("DATE(created_at)"))
            ->get()->map(function ($item) use ($dailyEscrow) {
                $dailyEscrow->put($item['date'], round($item['totalAmount'], 2));
            });


        $statistics['dailyEscrow'] = $dailyEscrow;


        $dailyPayout = $this->dayList();
        PayoutLog::whereMonth('created_at', Carbon::now()->month)
            ->select(
                DB::raw('sum(amount) as totalAmount'),
                DB::raw('DATE_FORMAT(created_at,"Day %d") as date')
            )
            ->where('status', 2)
            ->groupBy(DB::raw("DATE(created_at)"))
            ->get()->map(function ($item) use ($dailyPayout) {
                $dailyPayout->put($item['date'], round($item['totalAmount'], 2));
            });
        $statistics['payout'] = $dailyPayout;
        $statistics['schedule'] = $this->dayList();

        $data['payout'] = collect(PayoutLog::selectRaw('COUNT(CASE WHEN status = 1  THEN id END) AS pending')
            ->selectRaw('SUM((CASE WHEN status = 2 AND created_at >= CURDATE()  THEN amount END)) AS todayPayoutAmount')
            ->selectRaw('SUM((CASE WHEN status = 2 AND created_at >=  DATE_SUB(CURRENT_DATE() , INTERVAL DAYOFMONTH(CURRENT_DATE)-1 DAY) THEN amount END)) AS monthlyPayoutAmount')
            ->selectRaw('SUM((CASE WHEN status = 2 AND created_at >=  DATE_SUB(CURRENT_DATE() , INTERVAL DAYOFMONTH(CURRENT_DATE)-1 DAY) THEN charge END)) AS monthlyPayoutCharge')
            ->get()->toArray())->collapse();


        /*
         * Pie Chart Data
         */

        $data['escrow'] = collect(Escrow::selectRaw('COUNT(id) AS total')
            ->selectRaw('SUM(amount) AS totalEscrowAmount')
            ->selectRaw('COUNT(CASE WHEN status = 0  THEN status END) AS pending')
            ->selectRaw('COUNT(CASE WHEN status = 2  THEN status END) AS rejected')
            ->selectRaw('COUNT(CASE WHEN status = 1 AND  payment_status = 0 THEN status END) AS hold')
            ->selectRaw('COUNT(CASE WHEN status = 1 AND  payment_status = 1 THEN status END) AS completed')
            ->selectRaw('COUNT(CASE WHEN status = 1 AND  payment_status = 2 THEN status END) AS disputed')
            ->selectRaw('COUNT(CASE WHEN status = 1 AND  payment_status = 3 THEN status END) AS resolved')


            ->selectRaw('SUM((CASE WHEN status = 0 THEN amount END)) AS pendingAmount')
            ->selectRaw('SUM((CASE WHEN status = 2 THEN amount END)) AS rejectedAmount')
            ->selectRaw('SUM((CASE WHEN status = 1 AND  payment_status = 0 THEN amount END)) AS holdAmount')
            ->selectRaw('SUM((CASE WHEN status = 1 AND  payment_status = 1 THEN amount END)) AS completedAmount')
            ->selectRaw('SUM((CASE WHEN status = 1 AND  payment_status = 2 THEN amount END)) AS disputedAmount')
            ->selectRaw('SUM((CASE WHEN status = 1 AND  payment_status = 3 THEN amount END)) AS resolvedAmount')
           ->get()->toArray())->collapse();



        $totalEscrow = $data['escrow']['total'];
        $pieLog = collect();
        collect($data['escrow'])->only('pending','rejected','hold','completed','disputed','resolved')->map(function ($item, $key) use ($totalEscrow, $pieLog){
            $pieLog->push(['level' => kebab2Title($key), 'value' => (0 < $totalEscrow) ? (round($item / $totalEscrow * 100,2)) : 0]);
            return $item;
        });



        $data['subscriber'] =  Subscriber::count();
        $data['gateway'] =  Gateway::count();

        $data['latestUser'] = User::latest()->limit(5)->get();

        return view('admin.dashboard', $data, compact('statistics', 'statistics','pieLog'));
    }

    public function dayList()
    {
        $totalDays = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $daysByMonth = [];
        for ($i = 1; $i <= $totalDays; $i++) {
            array_push($daysByMonth, ['Day ' . sprintf("%02d", $i) => 0]);
        }

        return collect($daysByMonth)->collapse();
    }

    public function profile()
    {
        $admin = $this->user;
        return view('admin.profile', compact('admin'));
    }


    public function profileUpdate(Request $request)
    {
        $req = Purify::clean($request->except('_token', '_method'));
        $rules = [
            'name' => 'sometimes|required',
            'username' => 'sometimes|required|unique:admins,username,' . $this->user->id,
            'email' => 'sometimes|required|email|unique:admins,email,' . $this->user->id,
            'phone' => 'sometimes|required',
            'address' => 'sometimes|required',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpeg', 'jpg', 'png'])]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = $this->user;
        if ($request->hasFile('image')) {
            try {
                $old = $user->image ?: null;
                $user->image = $this->uploadImage($request->image, config('location.admin.path'), config('location.admin.size'), $old);
            } catch (\Exception $exp) {
                return back()->with('error', 'Image could not be uploaded.');
            }
        }
        $user->name = $req['name'];
        $user->username = $req['username'];
        $user->email = $req['email'];
        $user->phone = $req['phone'];
        $user->address = $req['address'];
        $user->save();

        return back()->with('success', 'Updated Successfully.');
    }


    public function password()
    {
        return view('admin.password');
    }

    public function passwordUpdate(Request $request)
    {
        $req = Purify::clean($request->all());

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $request = (object)$req;
        $user = $this->user;
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', "Password didn't match");
        }
        $user->update([
            'password' => bcrypt($request->password)
        ]);
        return back()->with('success', 'Password has been Changed');
    }
}
