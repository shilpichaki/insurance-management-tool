<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PolicyOrder;
use Validator;
use App\Util;

class PolicyorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policyOrder = PolicyOrder::all()->toArray();
        return $policyOrder;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $policyOrder = $request->isMethod('put') ? PolicyOrder::findOrFail($request->order_id) : new PolicyOrder;

        if($request->isMethod('put'))
        {
            $validator = Validator::make($request->all(), 
                [
                    'order_id' => 'required|integer', 
                    'order_date' => 'required|string',
                    'application_no' => 'required|string',
                    'customer_id' => 'required|integer',
                    'case_taker_type' => 'string|required',
                    'd_case_taker_id' => 'required_without:i_case_taker_id|string',
                    'i_case_taker_id' => 'required_without:d_case_taker_id|integer',
                    'policy_id' => 'integer|required',
                    'amount' => 'required|regex:/^\d{1,18}(\.\d{1,2})?$/',
                    'payment_mode' => 'string|required',
                    'instrument_no' => 'string|nullable',
                    'instrument_date' => 'string',
                    'nominee_name' => 'required|string',
                    'nominee_dob' => 'required|string',
                    'nominee_relation_id' => 'required|integer',
                    'handover_to_company_type' => 'required|string',
                    'handover_to_mother_company_id' => 'required_without:handover_to_sub_company_id|integer',
                    'handover_to_sub_company_id' => 'required_without:handover_to_mother_company_id|integer',
                    'handover_date' => 'string',
                    'plvc' => 'integer',
                    'policy_status_id' => 'integer|required',
                    'recovered' => 'integer|required',
                    'issuence_date' => 'string|nullable'
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
                    'order_date' => 'required|string',
                    'application_no' => 'required|string',
                    'customer_id' => 'required|integer',
                    'case_taker_type' => 'string|required',
                    'd_case_taker_id' => 'required_without:i_case_taker_id|string',
                    'i_case_taker_id' => 'required_without:d_case_taker_id|integer',
                    'policy_id' => 'integer|required',
                    'amount' => 'required|regex:/^\d{1,18}(\.\d{1,2})?$/',
                    'payment_mode' => 'string|required',
                    'instrument_no' => 'string|nullable',
                    'instrument_date' => 'string',
                    'nominee_name' => 'required|string',
                    'nominee_dob' => 'required|string',
                    'nominee_relation_id' => 'required|integer',
                    'handover_to_company_type' => 'required|string',
                    'handover_to_mother_company_id' => 'required_without:handover_to_sub_company_id|integer',
                    'handover_to_sub_company_id' => 'required_without:handover_to_mother_company_id|integer',
                    'handover_date' => 'string',
                    'plvc' => 'integer',
                    'policy_status_id' => 'integer|required',
                    'recovered' => 'integer|required',
                    'issuence_date' => 'string|nullable'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
        }

        $policyOrder->order_id = $request->input('order_id');
        $policyOrder->order_date = Util::mysqlDateTimeConverter($request->input('order_date'));
        $policyOrder->application_no = $request->input('application_no');
        $policyOrder->customer_id = $request->input('customer_id');
        $policyOrder->case_taker_type = $request->input('case_taker_type');
        $policyOrder->d_case_taker_id = $request->input('d_case_taker_id');
        $policyOrder->i_case_taker_id = $request->input('i_case_taker_id');
        $policyOrder->policy_id = $request->input('policy_id');
        $policyOrder->amount = $request->input('amount');
        $policyOrder->payment_mode = $request->input('payment_mode');
        $policyOrder->instrument_no = $request->input('instrument_no');
        $policyOrder->instrument_date = Util::mysqlDateTimeConverter($request->input('instrument_date'));
        $policyOrder->nominee_name = $request->input('nominee_name');
        $policyOrder->nominee_dob = Util::mysqlDateTimeConverter($request->input('nominee_dob'));
        $policyOrder->nominee_relation_id = $request->input('nominee_relation_id');
        $policyOrder->handover_to_company_type = $request->input('handover_to_company_type');
        $policyOrder->handover_to_mother_company_id = $request->input('handover_to_mother_company_id');
        $policyOrder->handover_to_sub_company_id = $request->input('handover_to_sub_company_id');
        $policyOrder->handover_date = Util::mysqlDateTimeConverter($request->input('handover_date'));
        $policyOrder->plvc = $request->input('plvc');
        $policyOrder->policy_status_id = $request->input('policy_status_id');
        $policyOrder->recovered = $request->input('recovered');
        $policyOrder->issuence_date = Util::mysqlDateTimeConverter($request->input('issuence_date'));

        if($policyOrder->save())
        {
            return $policyOrder;
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
        $policyOrder = PolicyOrder::findOrFail($id);
        return $policyOrder;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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