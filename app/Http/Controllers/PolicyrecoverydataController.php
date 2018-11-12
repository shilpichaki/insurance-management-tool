<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PolicyRecoveryData;
use App\PolicyOrder;
use App\Util;
use DB;
use Validator;

class PolicyrecoverydataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Find all Policyorder model with Payment Status ID 3
        $orderPaymentId = 3;

        $orderPaymentToRecover = PolicyOrder::where('order_payment_status_id', $orderPaymentId)->get();
        $recoverdPolicyData = PolicyRecoveryData::all();
        return view('policyrecoverydata.index',compact('orderPaymentToRecover','recoverdPolicyData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($orderid)
    {
        //Find all Policyorder model with Payment Status ID 3
        $orderPaymentId = 3;

        $orderData = PolicyOrder::select('application_no','order_id')->where('order_payment_status_id', $orderPaymentId)->get();
        return view('policyrecoverydata.create',compact('orderid','orderData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $policyPaymentRecovery = $request->isMethod('put') ? PolicyRecoveryData::findOrFail($request->recovery_id) : new PolicyRecoveryData;

        if($request->isMethod('put'))
        {
            $validator = Validator::make($request->all(), 
                [
                    'recovery_id' => 'required|integer',
                    'order_id' => 'required|integer', 
                    'recovery_date' => 'required|string',
                    'payment_mode' => 'string|required',
                    'instrument_no' => 'string|nullable',
                    'instrument_date' => 'string'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
        }
        else
        {
            $validator = Validator::make($request->all(), 
                [
                    'order_id' => 'required|integer', 
                    'recovery_date' => 'required|string',
                    'payment_mode' => 'string|required',
                    'instrument_no' => 'string|nullable',
                    'instrument_date' => 'string'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
        }

        DB::beginTransaction();

        try
        {
            $policyPaymentRecovery->recovery_id = $request->input('recovery_id');
            $policyPaymentRecovery->order_id = $request->input('order_id');
            $policyPaymentRecovery->recovery_date = Util::mysqlDateTimeConverter($request->input('recovery_date'));
            $policyPaymentRecovery->payment_mode = $request->input('payment_mode');
            $policyPaymentRecovery->instrument_no = $request->input('instrument_no');
            $policyPaymentRecovery->instrument_date = Util::mysqlDateTimeConverter($request->input('instrument_date'));
            $policyPaymentRecovery->save();

            $policyOrder = PolicyOrder::where('order_id', $request->input('order_id'))->update(array('order_payment_status_id' => 1,'recovered' => 1));

            DB::commit();
            return redirect('/policyrecoverydata');
        }
        catch(\Exception $e)
        {
            var_dump($e);
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find all Policyorder model with Payment Status ID 3
        $orderPaymentId = 3;

        $recoveryData = PolicyRecoveryData::where('recovery_id', $id)->first();
        $orderData = PolicyOrder::select('application_no','order_id')->where('order_payment_status_id', $orderPaymentId)->orWhere('order_id',$recoveryData->order_id)->get();
        return view('policyrecoverydata.edit',compact('id','orderData', 'recoveryData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
