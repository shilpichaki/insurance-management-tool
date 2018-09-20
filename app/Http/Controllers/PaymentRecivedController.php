<?php

namespace App\Http\Controllers;

use App\PaymentRecived;
use Illuminate\Http\Request;

class PaymentRecivedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->isMethod('put'))
        {
            //For Update
        }
        else
        {
            //For Create
            $paymentRecivedMain = new PaymentRecived;
            $paymentRecivedDetails = new PaymentRecivedAgainstDetails;

            $validator = Validator::make($request->all(), 
                [
                    'company_type' => 'required|string', 
                    'm_company_id' => 'required_without:s_company_id|string|nullable',
                    's_company_id' => 'required_without:m_company_id|string|nullable',
                    'is_gst' => 'required|boolean',
                    'gst_type' => 'string|nullable',
                    'tax_percentage' => 'integer|max:100|nullable',
                    'tax_amount' => 'nullable|regex:/^\d{1,18}(\.\d{1,2})?$/',
                    'payment_amount' => 'required|regex:/^\d{1,18}(\.\d{1,2})?$/',
                    'payment_mode' => 'string|required',
                    'instrument_no' => 'string|nullable',
                    'instrument_date' => 'required|string'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }

            $paymentRecivedMain->company_type = $request->input('order_id');
            $paymentRecivedMain->m_company_id = $request->input('order_id');
            $paymentRecivedMain->s_company_id = $request->input('order_id');
            $paymentRecivedMain->is_gst = $request->input('order_id');
            $paymentRecivedMain->gst_type = $request->input('order_id');
            $paymentRecivedMain->tax_percentage = $request->input('order_id');
            $paymentRecivedMain->tax_amount = $request->input('order_id');
            $paymentRecivedMain->payment_amount = $request->input('order_id');
            $paymentRecivedMain->payment_mode = $request->input('order_id');
            $paymentRecivedMain->instrument_no = $request->input('order_id');
            $paymentRecivedMain->instrument_date = $request->input('order_id');

             

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentRecived  $paymentRecived
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentRecived $paymentRecived)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentRecived  $paymentRecived
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentRecived $paymentRecived)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentRecived  $paymentRecived
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentRecived $paymentRecived)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentRecived  $paymentRecived
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentRecived $paymentRecived)
    {
        //
    }
}
