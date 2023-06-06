<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Notify;
use App\Models\Contact;
use App\Models\Escrow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Facades\App\Services\BasicService;


class ManageEscrowController extends Controller
{
    use Notify;

    public function index()
    {
        $title = "Escrow List";
        $escrowList = Escrow::latest()->paginate(config('basic.paginate'));
        return view('admin.escrow.list', compact('escrowList','title'));
    }

    public function search(Request $request)
    {
        $search = $request->all();
        $dateSearch = $request->date_time;
        $date = preg_match("/^[0-9]{2,4}\-[0-9]{1,2}\-[0-9]{1,2}$/", $dateSearch);




        $escrowList = Escrow::when(isset($search['search']), function ($query) use ($search) {
                return $query->where("invoice", $search['search']);
            })
            ->when($date == 1, function ($query) use ($dateSearch) {
                return $query->whereDate("created_at", $dateSearch);
            })
            ->when($search['status'] == 'pending', function ($query) use ($search) {
                return $query->where('status', 0);
            })
            ->when($search['status'] == 'hold', function ($query) use ($search) {
                return $query->where('status', 1)->where('payment_status',0);
            })
            ->when($search['status'] == 'completed', function ($query) use ($search) {
                return $query->where('status', 1)->where('payment_status',1);
            })
            ->when($search['status'] == 'disputed', function ($query) use ($search) {
                return $query->where('status', 1)->where('payment_status',2);
            })
            ->when($search['status'] == 'resolved', function ($query) use ($search) {
                return $query->where('status', 1)->where('payment_status',3);
            })
            ->when($search['status'] == 'rejected', function ($query) use ($search) {
                return $query->where('status', 2);
            })
            ->paginate(config('basic.paginate'));


        $title = "Search Escrow";

        return view('admin.escrow.list', compact('escrowList','title'));
    }
    public function pending()
    {
        $title = "Escrow Pending List";
        $escrowList = Escrow::where('status',0)->latest()->paginate(config('basic.paginate'));
        return view('admin.escrow.list', compact('escrowList','title'));
    }

    public function hold()
    {
        $title = "Escrow Hold List";
        $escrowList = Escrow::where('status',1)->where('payment_status',0)->latest()->paginate(config('basic.paginate'));
        return view('admin.escrow.list', compact('escrowList','title'));
    }

    public function completed()
    {
        $title = "Escrow Completed List";
        $escrowList = Escrow::where('status',1)->where('payment_status',1)->latest()->paginate(config('basic.paginate'));
        return view('admin.escrow.list', compact('escrowList','title'));
    }

    public function disputed()
    {
        $title = "Escrow Disputed List";
        $escrowList = Escrow::where('status',1)->where('payment_status',2)->latest()->paginate(config('basic.paginate'));
        return view('admin.escrow.list', compact('escrowList','title'));
    }

    public function resolved()
    {
        $title = "Escrow Resolved List";
        $escrowList = Escrow::where('status',1)->where('payment_status',3)->latest()->paginate(config('basic.paginate'));
        return view('admin.escrow.list', compact('escrowList','title'));
    }

    public function rejected()
    {
        $title = "Escrow Rejected List";
        $escrowList = Escrow::where('status',2)->latest()->paginate(config('basic.paginate'));
        return view('admin.escrow.list', compact('escrowList','title'));
    }



    public function details($id)
    {

        $escrow =  Escrow::findOrFail($id);
        $title = "Escrow #".$escrow->invoice;

        if($escrow->charge_bear == 'both'){
            $charge = $escrow->charge/2;
        }else {
            $charge = $escrow->charge;
        }
        $file_location = getFile(config('location.escrow.path').date('Y',strtotime($escrow->created_at)).'/'.date('m',strtotime($escrow->created_at)).'/'.date('d',strtotime($escrow->created_at)).'/'.$escrow->image);

        return view('admin.escrow.details', compact('escrow','title','charge','file_location'));
    }

    public function resolve(Request  $request, $id)
    {

        $basic = (object)config('basic');
        $receiver_id = $request->receiver_id;

        $escrow = Escrow::where('id', $id)->where(function ($query) use ($receiver_id) {
            $query->where('creator_id', $receiver_id)
                ->orWhere('joiner_id', $receiver_id);
        })->where('status',1)
            ->where('payment_status',2)
            ->first();

        if (!$escrow) {
            session()->flash('error', 'Invalid Request!');
            return redirect()->back();
        }

        if($escrow->charge_bear == 'both'){
            $charge = $escrow->charge/2;
        }elseif ($escrow->charge_bear == 'invitee'){
            $charge = $escrow->charge;
        }else{
            $charge = 0;
        }




        $escrow->resolved_by =  auth()->guard('admin')->id();
        $escrow->resolved_at =  Carbon::now();
        $escrow->payment_status =  3;
        $escrow->favor_id =  $receiver_id;
        $escrow->save();


        $user = $escrow->favor;

        $newAmount = ($escrow->amount - $charge);
        $user->balance += $newAmount;
        $user->save();


        $remarks = "Admin released Escrow ID $escrow->invoice payment";
        BasicService::makeTransaction($user, $newAmount, $charge, $trx_type = '+', strRandom(), $remarks);


        $msg = [
            'amount' => getAmount($escrow->amount),
            'currency' => $basic->currency,
            'escrow_id' => $escrow->invoice,
        ];

        $action = [
            "link" => '#',
            "icon" => "las la-money-bill"
        ];

        $this->userPushNotification($user, 'RESOLVED_DEAL', $msg, $action);

        $this->sendMailSms($user, 'RESOLVED_DEAL', [
            'amount' => getAmount($escrow->amount),
            'currency' => $basic->currency,
            'deal_for' => $escrow->title,
            'escrow_id' => $escrow->invoice
        ]);


        session()->flash('success', 'Payment has been resolved.');
        return redirect()->back();
    }
}
