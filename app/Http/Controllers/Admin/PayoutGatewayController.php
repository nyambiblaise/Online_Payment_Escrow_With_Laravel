<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload;
use App\Models\PayoutMethod;
use Illuminate\Http\Request;

class PayoutGatewayController extends Controller
{
    use Upload;

    public function index()
    {
        $data['page_title'] = "Payout Method";
        $data['methods'] = PayoutMethod::all();
        return view('admin.payout.index', $data);
    }

    public function create()
    {
        $page_title = "Add Payout Method ";
        return view('admin.payout.create', compact('page_title'));
    }

    public function store(Request $request)
    {


        $rules = [
            'name' => 'required',
            'minimum_amount' => 'required|numeric',
            'maximum_amount' => 'required|numeric',
            'fixed_charge' => 'required|numeric',
            'percent_charge' => 'required|numeric',
            'duration' => 'required|max:191'
        ];

        $this->validate($request, $rules);


        $gateway =  new PayoutMethod();
        $gateway->name = $request->name;
        $gateway->minimum_amount = $request->minimum_amount;
        $gateway->maximum_amount = $request->maximum_amount;
        $gateway->percent_charge = $request->percent_charge;
        $gateway->fixed_charge = $request->fixed_charge;
        $gateway->duration = $request->duration;
        $gateway->status = $request->status;

        $input_form = [];
        if ($request->has('field_name')) {
            for ($a = 0; $a < count($request->field_name); $a++) {
                $arr = array();
                $arr['field_name'] = strtolower(str_replace('.','',str_replace(' ', '_', $request->field_name[$a])));
                $arr['field_level'] = $request->field_name[$a];
                $arr['type'] = $request->type[$a];
                $arr['validation'] = $request->validation[$a];
                $input_form[$arr['field_name']] = $arr;
            }
        }

        $gateway->input_form = $input_form;



        if ($request->hasFile('image')) {

            try {
                $gateway->image = $this->uploadImage($request->image, config('location.withdraw.path'), config('location.withdraw.size'));
            } catch (\Exception $exp) {
                return back()->with('error', 'Image could not be uploaded.');
            }
        }

        $gateway->save();


        session()->flash('success', 'Saved Successfully');
        return back();
    }


    public function edit($id)
    {
        $method = PayoutMethod::findOrFail($id);
        $page_title =  $method->name;
        return view('admin.payout.edit', compact('method', 'page_title'));
    }

    public function update(Request $request, $id)
    {
        $gateway = PayoutMethod::findOrFail($id);

        $rules = [
            'name' => 'required',
            'minimum_amount' => 'required|numeric',
            'maximum_amount' => 'required|numeric',
            'fixed_charge' => 'required|numeric',
            'percent_charge' => 'required|numeric',
            'duration' => 'required|max:191'
        ];

        $this->validate($request, $rules);

        $gateway->name = $request->name;
        $gateway->minimum_amount = $request->minimum_amount;
        $gateway->maximum_amount = $request->maximum_amount;
        $gateway->percent_charge = $request->percent_charge;
        $gateway->fixed_charge = $request->fixed_charge;
        $gateway->duration = $request->duration;
        $gateway->status = $request->status;

        $input_form = [];

        if ($request->has('field_name')) {
            for ($a = 0; $a < count($request->field_name); $a++) {
                $arr = array();
                $arr['field_name'] = strtolower(str_replace('.','',str_replace(' ', '_', $request->field_name[$a])));
                $arr['field_level'] = $request->field_name[$a];
                $arr['type'] = $request->type[$a];
                $arr['validation'] = $request->validation[$a];
                $input_form[$arr['field_name']] = $arr;
            }
        }

        $gateway->input_form = $input_form;



        if ($request->hasFile('image')) {

            try {
                $old = $gateway->image ? : null;
                $image = $this->uploadImage($request->image, config('location.withdraw.path'), config('location.withdraw.size'), $old);

                $gateway->image = $image ? : $gateway->image;

            } catch (\Exception $exp) {
                return back()->with('error', 'Image could not be uploaded.');
            }
        }

        $gateway->save();

        session()->flash('success', 'Update Successfully');
        return back();
    }
}
