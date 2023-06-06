<?php

namespace App\Http\Controllers\User;

use App\Helper\GoogleAuthenticator;
use App\Http\Controllers\Controller;
use App\Http\Traits\Notify;
use App\Http\Traits\Upload;
use App\Models\Contact;
use App\Models\Escrow;
use App\Models\Fund;
use App\Models\Gateway;
use App\Models\Language;
use App\Models\PayoutLog;
use App\Models\PayoutMethod;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Stevebauman\Purify\Facades\Purify;
use Facades\App\Services\BasicService;

use hisorange\BrowserDetect\Parser as Browser;

class HomeController extends Controller
{
    use Upload, Notify;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
        $this->theme = template();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $auth = $this->user;

        $data['walletBalance'] = getAmount($auth->balance);
        $data['totalDeposit'] = getAmount($auth->funds()->whereStatus(1)->sum('amount'));
        $data['totalPayout'] = getAmount($auth->payout()->whereStatus(2)->sum('amount'));
        $data['ticket'] = Ticket::where('user_id', $auth->id)->count();


        $data['escrow'] = collect(Escrow::where(function ($query) use ($auth) {
            $query->where('creator_id', $auth->id)
                ->orWhere('joiner_id', $auth->id);
        })
            ->selectRaw("count(CASE WHEN status = 0  THEN status END) AS Pending")
            ->selectRaw("SUM(CASE WHEN status = 0 THEN amount END)  AS PendingAmount")
            ->selectRaw("count(CASE WHEN status = 2  THEN status END) AS Rejected")
            ->selectRaw("SUM(CASE WHEN status = 2  THEN amount END)  AS RejectedAmount")
            ->selectRaw("count(CASE WHEN status = 1 AND payment_status = 0 THEN status END) AS PaymentHold")
            ->selectRaw("SUM(CASE WHEN status = 1 AND  payment_status = 0 THEN amount END)  AS HoldAmount")
            ->selectRaw("count(CASE WHEN  status = 1 AND payment_status = 1 THEN status END) AS PaymentComplete")
            ->selectRaw("SUM(CASE WHEN status = 1 AND  payment_status = 1 THEN amount END)  AS CompleteAmount")
            ->selectRaw("count(CASE WHEN  creator_id = $auth->id AND status = 1 AND (payment_status = 1 OR payment_status = 3) THEN status END) AS PaymentRelease")
            ->selectRaw("SUM(CASE WHEN creator_id = $auth->id AND status = 1 AND  (payment_status = 1 OR payment_status = 3)  THEN amount END)  AS ReleaseAmount")
            ->selectRaw("count(CASE WHEN  joiner_id = $auth->id AND status = 1 AND (payment_status = 1 OR payment_status = 3) THEN status END) AS PaymentReceived")
            ->selectRaw("SUM(CASE WHEN joiner_id = $auth->id AND status = 1 AND  (payment_status = 1 OR payment_status = 3)  THEN amount END)  AS ReceivedAmount")
            ->selectRaw('count(CASE WHEN status = 1 AND  payment_status = 2 THEN status END) AS Disputed')
            ->selectRaw('SUM(CASE WHEN status = 1 AND  payment_status = 2 THEN amount END)  AS DisputedAmount')
            ->selectRaw("count(CASE WHEN status = 1 AND  payment_status = 3 AND favor_id =  $auth->id THEN status END) AS ResolvedByAdmin")
            ->selectRaw("SUM(CASE WHEN status = 1 AND  payment_status = 3 AND favor_id = $auth->id  THEN amount END)  AS ResolvedAmount")
            ->get()->toArray())->collapse();


        return view($this->theme . 'user.dashboard', $data);
    }


    public function transaction()
    {
        $transactions = $this->user->transaction()->orderBy('id', 'DESC')->paginate(config('basic.paginate'));
        return view($this->theme . 'user.transaction.index', compact('transactions'));
    }

    public function transactionSearch(Request $request)
    {
        $search = $request->all();
        $dateSearch = $request->datetrx;
        $date = preg_match("/^[0-9]{2,4}\-[0-9]{1,2}\-[0-9]{1,2}$/", $dateSearch);
        $transaction = Transaction::where('user_id', $this->user->id)->with('user')
            ->when(@$search['transaction_id'], function ($query) use ($search) {
                return $query->where('trx_id', 'LIKE', "%{$search['transaction_id']}%");
            })
            ->when(@$search['remark'], function ($query) use ($search) {
                return $query->where('remarks', 'LIKE', "%{$search['remark']}%");
            })
            ->when($date == 1, function ($query) use ($dateSearch) {
                return $query->whereDate("created_at", $dateSearch);
            })
            ->paginate(config('basic.paginate'));
        $transactions = $transaction->appends($search);


        return view($this->theme . 'user.transaction.index', compact('transactions'));

    }

    public function fundHistory()
    {
        $funds = Fund::where('user_id', $this->user->id)->where('status', '!=', 0)->orderBy('id', 'DESC')->with('gateway')->paginate(config('basic.paginate'));
        return view($this->theme . 'user.transaction.fundHistory', compact('funds'));
    }

    public function fundHistorySearch(Request $request)
    {
        $search = $request->all();

        $dateSearch = $request->date_time;
        $date = preg_match("/^[0-9]{2,4}\-[0-9]{1,2}\-[0-9]{1,2}$/", $dateSearch);

        $funds = Fund::orderBy('id', 'DESC')->where('user_id', $this->user->id)->where('status', '!=', 0)
            ->when(isset($search['name']), function ($query) use ($search) {
                return $query->where('transaction', 'LIKE', $search['name']);
            })
            ->when($date == 1, function ($query) use ($dateSearch) {
                return $query->whereDate("created_at", $dateSearch);
            })
            ->when(isset($search['status']), function ($query) use ($search) {
                return $query->where('status', $search['status']);
            })
            ->with('gateway')
            ->paginate(config('basic.paginate'));
        $funds->appends($search);
        return view($this->theme . 'user.transaction.fundHistory', compact('funds'));
    }


    public function addFund()
    {

        $data['totalPayment'] = null;
        $data['gateways'] = Gateway::where('status', 1)->orderBy('sort_by', 'ASC')->get();
        return view($this->theme . 'user.addFund', $data);
    }


    public function profile()
    {
        $user = $this->user;
        $languages = Language::all();
        return view($this->theme . 'user.profile.myprofile', compact('user', 'languages'));
    }


    public function updateProfile(Request $request)
    {

        $allowedExtensions = array('jpg', 'png', 'jpeg');

        $image = $request->image;
        $this->validate($request, [
            'image' => [
                'required',
                'max:4096',
                function ($fail) use ($image, $allowedExtensions) {
                    $ext = strtolower($image->extension());
                    if (!in_array($ext, $allowedExtensions)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }else{
                        if (($image->getSize() / 1000000) > 2) {
                            return $fail("Images MAX  2MB ALLOW!");
                        }
                    }

                }
            ]
        ]);
        $user = $this->user;
        if ($request->hasFile('image')) {
            $path = config('location.user.path');
            try {
                $user->image = $this->uploadImage($image, $path);
            } catch (\Exception $exp) {
                return back()->with('error', 'Could not upload your ' . $image)->withInput();
            }
        }
        $user->save();
        return back()->with('success', 'Updated Successfully.');
    }


    public function updateInformation(Request $request)
    {

        $languages = Language::all()->map(function ($item) {
            return $item->id;
        });

        $req = Purify::clean($request->all());
        $user = $this->user;
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => "sometimes|required|alpha_dash|min:5|unique:users,username," . $user->id,
            'address' => 'required',
            'language_id' => Rule::in($languages),
        ];
        $message = [
            'firstname.required' => 'First Name field is required',
            'lastname.required' => 'Last Name field is required',
        ];

        $validator = Validator::make($req, $rules, $message);
        if ($validator->fails()) {
            $validator->errors()->add('profile', '1');
            return back()->withErrors($validator)->withInput();
        }
        $user->language_id = $req['language_id'];
        $user->firstname = $req['firstname'];
        $user->lastname = $req['lastname'];
        $user->username = $req['username'];
        $user->address = $req['address'];
        $user->save();
        return back()->with('success', 'Updated Successfully.');
    }


    public function updatePassword(Request $request)
    {

        $rules = [
            'current_password' => "required",
            'password' => "required|min:5|confirmed",
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->errors()->add('password', '1');
            return back()->withErrors($validator)->withInput();
        }
        $user = $this->user;
        try {
            if (Hash::check($request->current_password, $user->password)) {
                $user->password = bcrypt($request->password);
                $user->save();
                return back()->with('success', 'Password Changes successfully.');
            } else {
                throw new \Exception('Current password did not match');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function twoStepSecurity()
    {
        $basic = (object)config('basic');
        $ga = new GoogleAuthenticator();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($this->user->username . '@' . $basic->site_title, $secret);
        $previousCode = $this->user->two_fa_code;

        $previousQR = $ga->getQRCodeGoogleUrl($this->user->username . '@' . $basic->site_title, $previousCode);
        return view($this->theme . 'user.twoFA.index', compact('secret', 'qrCodeUrl', 'previousCode', 'previousQR'));
    }

    public function twoStepEnable(Request $request)
    {
        $user = $this->user;
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);
        $ga = new GoogleAuthenticator();
        $secret = $request->key;
        $oneCode = $ga->getCode($secret);

        $userCode = $request->code;
        if ($oneCode == $userCode) {
            $user['two_fa'] = 1;
            $user['two_fa_verify'] = 1;
            $user['two_fa_code'] = $request->key;
            $user->save();
            $browser = new Browser();
            $this->mail($user, 'TWO_STEP_ENABLED', [
                'action' => 'Enabled',
                'code' => $user->two_fa_code,
                'ip' => request()->ip(),
                'browser' => $browser->browserName() . ', ' . $browser->platformName(),
                'time' => date('d M, Y h:i:s A'),
            ]);
            return back()->with('success', 'Two Factor has been enabled.');
        } else {
            return back()->with('error', 'Wrong Verification Code.');
        }

    }


    public function twoStepDisable(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);
        $user = $this->user;
        $ga = new GoogleAuthenticator();

        $secret = $user->two_fa_code;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode) {
            $user['two_fa'] = 0;
            $user['two_fa_verify'] = 1;
            $user['two_fa_code'] = null;
            $user->save();
            $browser = new Browser();
            $this->mail($user, 'TWO_STEP_DISABLED', [
                'action' => 'Disabled',
                'ip' => request()->ip(),
                'browser' => $browser->browserName() . ', ' . $browser->platformName(),
                'time' => date('d M, Y h:i:s A'),
            ]);

            return back()->with('success', 'Two Factor has been disabled.');
        } else {
            return back()->with('error', 'Wrong Verification Code.');
        }
    }


    /*
     * User payout Operation
     */
    public function payoutMoney()
    {
        $data['title'] = "Payout Money";
        $data['gateways'] = PayoutMethod::whereStatus(1)->get();
        return view($this->theme . 'user.payout.money', $data);
    }

    public function payoutMoneyRequest(Request $request)
    {
        $this->validate($request, [
            'gateway' => 'required|integer',
            'amount' => ['required', 'numeric']
        ]);

        $basic = (object)config('basic');
        $method = PayoutMethod::where('id', $request->gateway)->where('status', 1)->firstOrFail();
        $authWallet = $this->user;

        $charge = $method->fixed_charge + ($request->amount * $method->percent_charge / 100);

        $finalAmo = $request->amount + $charge;

        if ($request->amount < $method->minimum_amount) {
            session()->flash('error', 'Minimum payout Amount ' . round($method->minimum_amount, 2) . ' ' . $basic->currency);
            return back();
        }
        if ($request->amount > $method->maximum_amount) {
            session()->flash('error', 'Maximum payout Amount ' . round($method->maximum_amount, 2) . ' ' . $basic->currency);
            return back();
        }

        if (getAmount($finalAmo) > $authWallet->balance) {
            session()->flash('error', 'Insufficient Balance For Withdraw.');
            return back();
        } else {
            $trx = strRandom();
            $withdraw = new PayoutLog();
            $withdraw->user_id = $authWallet->id;
            $withdraw->method_id = $method->id;
            $withdraw->amount = getAmount($request->amount);
            $withdraw->charge = $charge;
            $withdraw->net_amount = $finalAmo;
            $withdraw->trx_id = $trx;
            $withdraw->status = 0;
            $withdraw->save();
            session()->put('wtrx', $trx);
            return redirect()->route('user.payout.preview');
        }
    }


    public function payoutPreview()
    {
        $withdraw = PayoutLog::latest()->where('trx_id', session()->get('wtrx'))->where('status', 0)->latest()->with('method', 'user')->firstOrFail();
        $title = "Payout Form";
        return view($this->theme . 'user.payout.preview', compact('withdraw', 'title'));
    }


    public function payoutRequestSubmit(Request $request)
    {
        $basic = (object)config('basic');
        $withdraw = PayoutLog::latest()->where('trx_id', session()->get('wtrx'))->where('status', 0)->with('method', 'user')->firstOrFail();
        $rules = [];
        $inputField = [];
        if (optional($withdraw->method)->input_form != null) {
            foreach ($withdraw->method->input_form as $key => $cus) {
                $rules[$key] = [$cus->validation];
                if ($cus->type == 'file') {
                    array_push($rules[$key], 'image');
                    array_push($rules[$key], 'mimes:jpeg,jpg,png');
                    array_push($rules[$key], 'max:2048');
                }
                if ($cus->type == 'text') {
                    array_push($rules[$key], 'max:191');
                }
                if ($cus->type == 'textarea') {
                    array_push($rules[$key], 'max:300');
                }
                $inputField[] = $key;
            }
        }

        $this->validate($request, $rules);
        $user = $this->user;

        if (getAmount($withdraw->net_amount) > $user->balance) {
            session()->flash('error', 'Insufficient Balance For Payout.');
            return redirect()->route('user.payout.money');
        } else {

            $req = Purify::clean($request->all());
            $req = (object)$req;
            $collection = collect($req);

            $reqField = [];
            if ($withdraw->method->input_form != null) {
                foreach ($collection as $k => $v) {

                    foreach ($withdraw->method->input_form as $inKey => $inVal) {
                        if ($k != $inKey) {
                            continue;
                        } else {
                            if ($inVal->type == 'file') {
                                if ($request->hasFile($inKey)) {
                                    $image = $request->file($inKey);
                                    $filename = time() . uniqid() . '.jpg';
                                    $location = config('location.withdrawLog.path');
                                    $reqField[$inKey] = [
                                        'field_name' => $filename,
                                        'type' => $inVal->type,
                                    ];
                                    try {
                                        $this->uploadImage($image, $location, $size = null, $old = null, $thumb = null, $filename);
                                    } catch (\Exception $exp) {
                                        return back()->with('error', 'Image could not be uploaded.');
                                    }

                                }
                            } else {
                                $reqField[$inKey] = $v;
                                $reqField[$inKey] = [
                                    'field_name' => $v,
                                    'type' => $inVal->type,
                                ];
                            }
                        }
                    }
                }
                $withdraw['information'] = $reqField;
            } else {
                $withdraw['information'] = null;
            }

            $withdraw->status = 1;
            $withdraw->save();

            $user->balance = getAmount($user->balance - $withdraw->net_amount);
            $user->save();


            $remarks = 'Withdraw Via ' . optional($withdraw->method)->name;
            BasicService::makeTransaction($user, $withdraw->amount, $withdraw->charge, $trx_type = '-', $withdraw->trx_id, $remarks);


            $this->sendMailSms($user, $type = 'PAYOUT_REQUEST', [
                'method_name' => optional($withdraw->method)->name,
                'amount' => getAmount($withdraw->amount),
                'charge' => getAmount($withdraw->charge),
                'currency' => $basic->currency,
                'trx' => $withdraw->trx_id,
            ]);


            $msg = [
                'username' => $user->username,
                'amount' => getAmount($withdraw->amount),
                'currency' => $basic->currency
            ];
            $action = [
                "link" => route('admin.user.withdrawal', $user->id),
                "icon" => "fa fa-money-bill-alt "
            ];
            $this->adminPushNotification('PAYOUT_REQUEST', $msg, $action);

            session()->flash('success', 'Payout request Successfully Submitted. Wait For Confirmation.');
            return redirect()->route('user.payout.money');
        }
    }


    public function payoutHistory()
    {
        $user = $this->user;
        $data['payoutLog'] = PayoutLog::whereUser_id($user->id)->where('status', '!=', 0)->latest()->with('user', 'method')->paginate(config('basic.paginate'));
        $data['title'] = "Payout Log";
        return view($this->theme . 'user.payout.log', $data);
    }


    public function payoutHistorySearch(Request $request)
    {
        $search = $request->all();

        $dateSearch = $request->date_time;
        $date = preg_match("/^[0-9]{2,4}\-[0-9]{1,2}\-[0-9]{1,2}$/", $dateSearch);

        $payoutLog = PayoutLog::orderBy('id', 'DESC')->where('user_id', $this->user->id)->where('status', '!=', 0)
            ->when(isset($search['name']), function ($query) use ($search) {
                return $query->where('trx_id', 'LIKE', "%" . $search['name'] . "%");
            })
            ->when($date == 1, function ($query) use ($dateSearch) {
                return $query->whereDate("created_at", $dateSearch);
            })
            ->when(isset($search['status']), function ($query) use ($search) {
                return $query->where('status', $search['status']);
            })
            ->with('user', 'method')->paginate(config('basic.paginate'));
        $payoutLog->appends($search);

        $title = "Payout Log";
        return view($this->theme . 'user.payout.log', compact('title', 'payoutLog'));

    }


    public function makeEscrow()
    {

        $auth = $this->user;

        $contactList = Contact::where(function ($query) use ($auth) {
            $query->where('user_id', $auth->id)
                ->orWhere('receiver_id', $auth->id);
        })->with(['user', 'receiver'])
            ->where('status', 1)
            ->latest()
            ->get()->map(function ($item) use ($auth) {
                if ($item->status == 2 && $item->modified_by != $auth->id) {
                    return false;
                }
                $data["id"] = $item->id;
                $data["user_id"] = $item->user_id;
                $data["receiver_id"] = $item->receiver_id;
                $data["status"] = $item->status;
                $data["accepted_by"] = $item->accepted_by;
                $data["modified_by"] = $item->modified_by;
                $data["modified_at"] = $item->modified_at;
                $data["deleted_at"] = $item->deleted_at;
                $data["created_at"] = $item->created_at;
                $data["updated_at"] = $item->updated_at;
                if ($item->user_id == $auth->id) {

                    $data["info"] = [
                        "username" => optional($item->receiver)->username,
                        "image" => optional($item->receiver)->image,
                        "fullname" => optional($item->receiver)->fullname,
                        "mobile" => optional($item->receiver)->mobile,
                        "profileName" => optional($item->receiver)->profileName
                    ];
                } elseif ($item->receiver_id == $auth->id) {
                    $data["info"] = [
                        "username" => optional($item->user)->username,
                        "image" => optional($item->user)->image,
                        "fullname" => optional($item->user)->fullname,
                        "mobile" => optional($item->user)->mobile,
                        "profileName" => optional($item->user)->profileName
                    ];
                }
                return $data;

            });


        return view($this->theme . 'user.escrow.create', compact('contactList'));
    }

    public function saveEscrow(Request $request)
    {

        $allowedExtensions = array('jpg', 'png', 'jpeg','pdf');
        $image = $request->image;

        $rules = [
            'title' => "required|max:191",
            'rules' => "required|max:1000",
            'amount' => "required|numeric",
            'opponent' => "required|integer",
            'charge_bear' => [
                "required",
                Rule::in(['invitor','invitee','both'])
            ],
            'image' => [
                'nullable',
                'max:4096',
                function ($fail) use ($image, $allowedExtensions) {
                    $ext = strtolower($image->getClientOriginalExtension());


                    if (!in_array($ext, $allowedExtensions)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }else{
                        if (($image->getSize() / 1000000) > 2) {
                            return $fail("Images MAX  2MB ALLOW!");
                        }
                    }

                }
            ]
        ];


        $req = Purify::clean($request->all());

        $validator = Validator::make($req, $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $basic = (object)config('basic');

        $auth = $this->user;
        $amount = (float)$req['amount'];

        $charge = ($amount * $basic->escrow_charge) / 100;

        if ($amount < $basic->minimum_escrow) {
            session()->flash('error', 'Minimum Amount ' . round($basic->minimum_escrow, 2) . ' ' . $basic->currency);
            return back();
        }
        if ($amount > $basic->maximum_escrow) {
            session()->flash('error', 'Maximum Amount ' . round($basic->maximum_escrow, 2) . ' ' . $basic->currency);
            return back();
        }


        $authCharge = 0;

        if($request->charge_bear == 'invitor'){
            $authCharge = $charge;
        }elseif($request->charge_bear == 'both'){
            $authCharge = $charge /2;
        }



        if (($auth->balance + $authCharge) < $amount) {
            session()->flash('error', 'Insufficient Balance.');
            return redirect()->back()->withInput();
        }

        $contact = Contact::where('id', $req['opponent'])->where(function ($query) use ($auth) {
            $query->where('user_id', $auth->id)
                ->orWhere('receiver_id', $auth->id);
        })->where('status', 1)->first();

        if (!$contact) {
            session()->flash('error', 'Invalid opponent has been selected!');
            return redirect()->back()->withInput();
        }


        $auth->balance -= ($amount + $authCharge);
        $auth->save();


        $trx_id = strRandom();


        $invitee = ($contact->user_id == $auth->id) ? $contact->receiver : $contact->user;


        BasicService::makeTransaction($auth, $amount, $authCharge, $trx_type = '-', $trx_id, 'Make a new deal for ' . $invitee->username);


        $escrow = new Escrow();
        $escrow->creator_id = $auth->id;
        $escrow->joiner_id = $invitee->id;
        $escrow->amount = $amount;
        $escrow->title = $req['title'];
        $escrow->rules = $req['rules'];
        $escrow->invoice = $this->getInvoiceNo();

        $escrow->charge = $charge;
        $escrow->charge_bear = strtolower($req['charge_bear']);

        if ($request->hasFile('image')) {
            $path = config('location.escrow.path').date('Y').'/'.date('m').'/'.date('d');
            try {
                $escrow->image = $this->uploadImage($image, $path);
            } catch (\Exception $exp) {
                return back()->with('error', 'Could not upload your ' . $image)->withInput();
            }
        }


        $escrow->save();


        $msg = [
            'username' => $auth->username,
            'amount' => getAmount($amount),
            'currency' => $basic->currency,
        ];
        $action = [
            "link" => '#',
            "icon" => "fa fa-money-bill-alt"
        ];
        $this->userPushNotification($invitee, 'INVITE_TO_JOIN_DEAL', $msg, $action);

        session()->flash('success', 'Your request has been sent');
        return redirect()->back();

    }


    public function myContactList()
    {
        $auth = $this->user;

        $contactList = Contact::where(function ($query) use ($auth) {
            $query->where('user_id', $auth->id)
                ->orWhere('receiver_id', $auth->id);
        })->with(['user', 'receiver'])
            ->paginate(config('basic.paginate'));

        $contactList = resourcePaginate($contactList, function ($item) use ($auth) {
            if ($item->status == 2 && $item->modified_by != $auth->id) {
                return false;
            }
            $data["id"] = $item->id;
            $data["user_id"] = $item->user_id;
            $data["receiver_id"] = $item->receiver_id;
            $data["status"] = $item->status;
            $data["accepted_by"] = $item->accepted_by;
            $data["modified_by"] = $item->modified_by;
            $data["modified_at"] = $item->modified_at;
            $data["deleted_at"] = $item->deleted_at;
            $data["created_at"] = $item->created_at;
            $data["updated_at"] = $item->updated_at;
            if ($item->user_id == $auth->id) {

                $data["info"] = [
                    "username" => optional($item->receiver)->username,
                    "image" => optional($item->receiver)->image,
                    "fullname" => optional($item->receiver)->fullname,
                    "mobile" => optional($item->receiver)->mobile,
                    "profileName" => optional($item->receiver)->profileName
                ];
            } elseif ($item->receiver_id == $auth->id) {
                $data["info"] = [
                    "username" => optional($item->user)->username,
                    "image" => optional($item->user)->image,
                    "fullname" => optional($item->user)->fullname,
                    "mobile" => optional($item->user)->mobile,
                    "profileName" => optional($item->user)->profileName
                ];
            }
            return $data;

        });

        return view($this->theme . 'user.escrow.contact-list', compact('contactList'));
    }

    public function acceptRequest($id)
    {
        $contact = Contact::where('id', $id)->where('receiver_id', $this->user->id)->firstOrFail();
        if ($contact->status == 0) {
            $contact->status = 1;
            $contact->modified_by = $this->user->id;
            $contact->modified_at = Carbon::now();
            $contact->save();


            $msg = [
                'username' => $this->user->username
            ];
            $action = [
                "link" => '#',
                "icon" => "las la-user-friends "
            ];
            $this->userPushNotification($this->user, 'ACCEPT_FRIEND_REQUEST', $msg, $action);

            session()->flash('success', 'Request has been accepted.');
            return redirect()->back();
        }
        session()->flash('warning', 'You are already connected.');
        return redirect()->back();
    }

    public function rejectRequest($id)
    {
        $contact = Contact::where('id', $id)->where('receiver_id', $this->user->id)->firstOrFail();
        if ($contact->status == 0) {
            $contact->status = 3;
            $contact->modified_by = $this->user->id;
            $contact->modified_at = Carbon::now();
            $contact->save();

            $msg = [
                'username' => $this->user->username
            ];
            $action = [
                "link" => '#',
                "icon" => "las la-user-friends"
            ];
            $this->userPushNotification($this->user, 'CANCEL_FRIEND_REQUEST', $msg, $action);

            $contact->delete();

            session()->flash('success', 'Request has been rejected.');
            return redirect()->back();
        }
        session()->flash('warning', 'You are not connected each other');
        return redirect()->back();

    }

    public function blockConnection($id)
    {
        $auth = $this->user;
        $contact = Contact::where('id', $id)->where(function ($query) use ($auth) {
            $query->where('user_id', $auth->id)
                ->orWhere('receiver_id', $auth->id);
        })->firstOrFail();

        if ($contact->status == 2) {
            session()->flash('error', 'You are not connected each other');
            return redirect()->back();
        }
        $contact->status = 2;
        $contact->modified_by = $auth->id;
        $contact->modified_at = Carbon::now();
        $contact->save();

        session()->flash('success', 'This user has been blocked.');
        return redirect()->back();
    }

    public function unblockConnection($id)
    {
        $auth = $this->user;
        $contact = Contact::where('id', $id)
            ->where('modified_by', $auth->id)
            ->where(function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->orWhere('receiver_id', $auth->id);
            })->firstOrFail();

        if ($contact->status != 2) {
            session()->flash('error', 'You are connected each other');
            return redirect()->back();
        }

        $contact->status = 1;
        $contact->modified_by = $auth->id;
        $contact->modified_at = Carbon::now();
        $contact->save();

        session()->flash('success', 'This user has been unblocked.');
        return redirect()->back();
    }

   public function checkContact(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'search' => 'required'
        ]);
        if ($validator->fails()) {
            return response($validator->messages(), 422);
        }

        $search = str_replace("@","",$request->search);

        $auth = $this->user;


        $user = User::where('id', '!=', $auth->id)->where(function ($query) use ($search) {
            return $query->where('email', "{$search}")
                ->orWhere('username', "{$search}")
                ->orWhere('phone', "{$search}");
        })
            ->where('status', 1)
            ->first();

        if (!$user) {
            return response(['search' => ["``" . $search . "`` does not exist in our records!"]], 422);
        }

        if (!$user) {
            return response(['search' => ["``" . $search . "`` does not exist in our records!"]], 422);
        }


        $contact = Contact::where(function ($query) use ($auth, $user) {
            $query->where('user_id', $auth->id)
                ->orWhere('receiver_id', $auth->id);
        })
            ->where(function ($query) use ($auth, $user) {
                $query->where('user_id', $user->id)
                    ->orWhere('receiver_id', $user->id);
            })
            ->first();

        if ($contact) {
            if ($contact->status == 2) {
                return response(['search' => ["You're not eligible to connected with ``" . $search . "``."]], 422);
            }
            if ($contact->status == 1) {
                return response(['search' => ["Already you're connected with ``" . $search . "``."]], 422);
            }
            if ($contact->status == 0 && $contact->user_id == $auth->id) {
                return response(['search' => ["Already sent a request connection to ``" . $search . "``."]], 422);
            }
            if ($contact->status == 0 && $contact->receiver_id == $auth->id) {
                return response(['search' => ["``" . $search . "`` sent a request connection to you,  Please accept his/her request."]], 422);
            }
        }

        $records = Contact::where([
            'user_id' => $auth->id,
            'receiver_id' => $user->id
        ])->count();

        if($records == 0){
            Contact::create([
                'user_id' => $auth->id,
                'receiver_id' => $user->id,
                'status' => 0
            ]);
    
    
            $msg = [
                'username' => $auth->username
            ];
            $action = [
                "link" => '#',
                "icon" => "las la-user-friends "
            ];
            $this->userPushNotification($user, 'SENT_FRIEND_REQUEST', $msg, $action);
    
            return response(['success' => 'Invitation has been sent to ' . " ``" . @$search . "``"]);    
        }
        

    }

    private function getInvoiceNo()
    {
        $invoiceNo = $this->generateInvoiceNo();

        if (Escrow::where('invoice', $invoiceNo)->exists()) {
            return $this->generateInvoiceNo();
        }

        return $invoiceNo;
    }

    private function generateInvoiceNo()
    {
        return mt_rand(10000000, 99999999);
    }


    public function myEscrow()
    {
        $auth = $this->user;
        $myEscrow = Escrow::where(function ($query) use ($auth) {
            $query->where('creator_id', $auth->id)
                ->orWhere('joiner_id', $auth->id);
        })->with(['user', 'invitee'])
            ->latest()
            ->paginate(config('basic.paginate'));

        $myEscrow = resourcePaginate($myEscrow, function ($item) use ($auth) {

            if($item->charge_bear == 'both'){
                $charge = $item->charge/2;
            }elseif ( $item->creator_id == $auth->id && $item->charge_bear == 'invitor'){
                $charge = $item->charge;
            }elseif ( $item->joiner_id == $auth->id && $item->charge_bear == 'invitee'){
                $charge = $item->charge;
            }else{
                $charge = 0;
            }


            $data["id"] = $item->id;
            $data["creator_id"] = $item->creator_id;
            $data["joiner_id"] = $item->joiner_id;
            $data["amount"] = $item->amount;
            $data["title"] = $item->title;
            $data["rules"] = $item->rules;
            $data["status"] = $item->status;
            $data["payment_status"] = $item->payment_status;
            $data["resolved_by"] = $item->resolved_by;
            $data["resolved_at"] = $item->resolved_at;
            $data["invoice"] = $item->invoice;
            $data["report"] = $item->report;

            $data["charge"] =  $charge;
            $data["charge_bear"] = $item->charge_bear;
            $data["image"] = $item->image;

            $data["file_location"] = getFile(config('location.escrow.path').date('Y',strtotime($item->created_at)).'/'.date('m',strtotime($item->created_at)).'/'.date('d',strtotime($item->created_at)).'/'.$item->image);
            $data["created_at"] = $item->created_at;
            $data["updated_at"] = $item->updated_at;
            $data['invitee'] = ($item->creator_id == $auth->id) ? $item->invitee : $item->user;
            $data['user'] = ($item->creator_id == $auth->id) ? $item->user : $item->invitee;


            return $data;
        });

        return view($this->theme . 'user.escrow.index', compact('myEscrow'));
    }


    public function escrowConfirmation($id, Request $request)
    {
        $rules = [
            'action' => ['required', Rule::in(['accept', 'reject'])],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $basic = (object)config('basic');

        $auth = $this->user;

        $escrow = Escrow::where('id', $id)->where(function ($query) use ($auth) {
            $query->where('joiner_id', $auth->id);
        })->with(['user', 'invitee'])
            ->first();
        if (!$escrow) {
            session()->flash('error', 'Invalid Request!');
            return redirect()->back();
        }

        if ($escrow->status != 0) {
            session()->flash('error', 'Invalid Request!');
            return redirect()->back();
        }


        $creator = $escrow->user;


        if ($request->action == 'accept') {
            $escrow->status = 1;
            $escrow->save();
            $msg = [
                'username' => $auth->username,
                'amount' => getAmount($escrow->amount),
                'currency' => $basic->currency
            ];

            $action = [
                "link" => '#',
                "icon" => "las la-money-bill"
            ];
            $this->userPushNotification($creator, 'ACCEPTED_DEAL', $msg, $action);

            $this->sendMailSms($creator, 'ACCEPTED_DEAL', [
                'username' => $auth->username,
                'amount' => getAmount($escrow->amount),
                'currency' => $basic->currency,
                'deal_for' => $escrow->title,
                'escrow_id' => $escrow->invoice
            ]);

            session()->flash('success', 'Deal has been accepted.');
            return redirect()->back();

        }

        if ($request->action == 'reject') {
            $escrow->status = 2;
            $escrow->save();

            $creator->balance += $escrow->amount;
            $creator->save();

            $remarks = "Ecrow ID $escrow->invoice has been rejected";
            BasicService::makeTransaction($creator, $escrow->amount, 0, $trx_type = '+', strRandom(), $remarks);


            $msg = [
                'username' => $auth->username,
                'amount' => getAmount($escrow->amount),
                'currency' => $basic->currency
            ];

            $action = [
                "link" => '#',
                "icon" => "las la-money-bill"
            ];
            $this->userPushNotification($creator, 'REJECTED_DEAL', $msg, $action);

            $this->sendMailSms($creator, 'REJECTED_DEAL', [
                'username' => $auth->username,
                'amount' => getAmount($escrow->amount),
                'currency' => $basic->currency,
                'deal_for' => $escrow->title,
                'escrow_id' => $escrow->invoice
            ]);

            session()->flash('success', 'Deal has been rejected.');
            return redirect()->back();
        }
    }

    public function escrowRelease($id, Request $request)
    {
        $rules = [
            'action' => ['required', Rule::in(['release'])],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $basic = (object)config('basic');

        $auth = $this->user;
        $escrow = Escrow::where('id', $id)->where(function ($query) use ($auth) {
            $query->where('creator_id', $auth->id);
        })->with(['user', 'invitee'])
            ->first();

        if (!$escrow) {
            session()->flash('error', 'Invalid Request!');
            return redirect()->back();
        }

        if ($escrow->status != 1 && $escrow->payment_status != 0) {
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



        $escrow->payment_status = 1;
        $escrow->save();


        $newAmount =  ($escrow->amount - $charge);
        $opponent = $escrow->invitee;
        $opponent->balance += $newAmount;
        $opponent->save();

        $remarks = "$auth->username released Escrow ID $escrow->invoice payment";
        BasicService::makeTransaction($opponent, $newAmount, $charge, $trx_type = '+', strRandom(), $remarks);

        $msg = [
            'username' => $auth->username,
            'amount' => getAmount($escrow->amount),
            'currency' => $basic->currency,
            'escrow_id' => $escrow->invoice,
        ];

        $action = [
            "link" => '#',
            "icon" => "las la-money-bill"
        ];
        $this->userPushNotification($opponent, 'RELEASED_DEAL', $msg, $action);

        $this->sendMailSms($opponent, 'RELEASED_DEAL', [
            'username' => $auth->username,
            'amount' => getAmount($escrow->amount),
            'currency' => $basic->currency,
            'deal_for' => $escrow->title,
            'escrow_id' => $escrow->invoice
        ]);

        session()->flash('success', 'Payment has been released.');
        return redirect()->back();
    }

    public function escrowToReport($id, Request $request)
    {
        $rules = [
            'action' => ['required', Rule::in(['report'])],
            'report' => ['required', 'max:600']
        ];

        $req = Purify::clean($request->all());


        $validator = Validator::make($req, $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $basic = (object)config('basic');

        $auth = $this->user;
        $escrow = Escrow::where('id', $id)->where(function ($query) use ($auth) {
            $query->where('creator_id', $auth->id)
                ->orWhere('joiner_id', $auth->id);
        })->with(['user', 'invitee'])
            ->first();


        $opponent = ($escrow->creator_id == $auth->id) ? $escrow->invitee : $escrow->user;


        if (!$escrow) {
            session()->flash('error', 'Invalid Request!');
            return redirect()->back();
        }

        if ($escrow->status != 1) {
            session()->flash('error', 'Invalid Request!');
            return redirect()->back();
        }

        if ($escrow->payment_status != 0) {
            session()->flash('error', 'Invalid Request!');
            return redirect()->back();
        }

        if ($req['action'] == 'report') {
            $escrow->payment_status = 2;
            $escrow->reported_by = $auth->id;
            $escrow->report = $req['report'];
            $escrow->save();


            $msg = [
                'username' => $auth->username,
                'escrow_id' => $escrow->invoice,
            ];


            $action = [
                "link" => route('user.escrow.reports', $escrow->id),
                "icon" => "las la-exclamation-triangle"
            ];
            $this->userPushNotification($opponent, 'REPORTED_DEAL', $msg, $action);


            $adminMsg = [
                'username' => $auth->username,
                'amount' => getAmount($escrow->amount),
                'currency' => $basic->currency,
                'escrow_id' => $escrow->invoice
            ];
            $adminAction = [
                "link" => route('admin.escrow.details', $escrow->id),
                "icon" => "fab fa-hire-a-helper text-white"
            ];

            $this->adminPushNotification('REPORT_TO_ADMIN', $adminMsg, $adminAction);

            $this->sendMailSms($opponent, 'REPORTED_DEAL', [
                'username' => $auth->username,
                'amount' => getAmount($escrow->amount),
                'currency' => $basic->currency,
                'deal_for' => $escrow->title,
                'escrow_id' => $escrow->invoice
            ]);


            session()->flash('success', 'Your report has been sent.');
            return redirect()->back();
        }

        session()->flash('error', 'Invalid Request.');
        return redirect()->back();
    }

    public function reports($id)
    {
        $basic = (object)config('basic');

        $auth = $this->user;
        $escrow = Escrow::where('id', $id)->where(function ($query) use ($auth) {
            $query->where('creator_id', $auth->id)
                ->orWhere('joiner_id', $auth->id);
        })->where('status', 1)->whereIn('payment_status', [2, 3])->with(['user', 'invitee'])
            ->first();




        if($escrow->charge_bear == 'both'){
            $charge = $escrow->charge/2;
        }elseif ( $escrow->creator_id == $auth->id && $escrow->charge_bear == 'invitor'){
            $charge = $escrow->charge;
        }elseif ( $escrow->joiner_id == $auth->id && $escrow->charge_bear == 'invitee'){
            $charge = $escrow->charge;
        }else{
            $charge = 0;
        }



        $data["charge"] =  $charge;
        $data["charge_bear"] = $escrow->charge_bear;
        $data["file_location"] = getFile(config('location.escrow.path').date('Y',strtotime($escrow->created_at)).'/'.date('m',strtotime($escrow->created_at)).'/'.date('d',strtotime($escrow->created_at)).'/'.$escrow->image);

        if (!$escrow) {
            session()->flash('error', 'Invalid Request!');
            return redirect()->route('user.myEscrow');
        }

        return view($this->theme . 'user.escrow.chat', compact('escrow', 'auth','data'));

    }

}
