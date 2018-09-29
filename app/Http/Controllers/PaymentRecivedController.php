<?php

namespace App\Http\Controllers;

use App\PaymentRecived;
use App\PaymentRecivedAgainstDetails;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Util;

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
        $mothercompanylist = DB::select("select m_company_id,m_company_name from tbl_mother_company_mast");
        $subcompanylist = DB::select("select s_company_id,s_company_name from tbl_sub_company_mast");
        return view('paymentreceived.create',compact('mothercompanylist','subcompanylist'));
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

            DB::beginTransaction();

            try
            {
                $maxExistingID = PaymentRecived::max('payment_id') + 1;

                $paymentRecivedMain->payment_id = $maxExistingID;
                $paymentRecivedMain->company_type = $request->input('company_type');
                $paymentRecivedMain->m_company_id = $request->input('m_company_id');
                $paymentRecivedMain->s_company_id = $request->input('s_company_id');
                $paymentRecivedMain->is_gst = $request->input('is_gst');
                $paymentRecivedMain->gst_type = $request->input('gst_type');
                $paymentRecivedMain->tax_percentage = $request->input('tax_percentage');
                $paymentRecivedMain->tax_amount = $request->input('tax_amount');
                $paymentRecivedMain->payment_amount = $request->input('payment_amount');
                $paymentRecivedMain->payment_mode = $request->input('payment_mode');
                $paymentRecivedMain->instrument_no = $request->input('instrument_no');
                $paymentRecivedMain->instrument_date = $request->input('instrument_date');

                $paymentDetails = (array) json_decode($request->input('payment_details_json'));

                $paymentRecivedMain->save();

                foreach($paymentDetails as $paymentDetail)
                {
                    $paymentRecivedDetails->payment_id = $maxExistingID;
                    $paymentRecivedDetails->order_id = $paymentDetail->order_id;
                    $paymentRecivedDetails->policy_id = $paymentDetail->policy_id;
                    $paymentRecivedDetails->order_amount = $paymentDetail->order_amount;

                    DB::table('tbl_payment_recived_against_details')->insert(
                        ['payment_id' => $maxExistingID, 'order_id' => $paymentDetail->order_id, 'policy_id' => $paymentDetail->policy_id, 'order_amount' => $paymentDetail->order_amount]
                    );
                }
                DB::commit();
                return $paymentRecivedMain;
            }
            catch(\Exception $e)
            {
                var_dump($e);
                DB::rollback();
            }
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
