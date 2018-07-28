<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brokercompany;
use Validator;
use App\Http\Resources\BrokercompanyResource;

class BrokercompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brokerCompanyList = Brokercompany::all()->toArray();
        return view('Brokercompany.index',compact('brokerCompanyList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('Brokercompany.create');
    }
    public function edit()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brokercompany = $request->isMethod('put') ? Brokercompany::findOrFail($request->company_id) : new Brokercompany;

        if($request->isMethod('put'))
        {
            $validator = Validator::make($request->all(), 
                [
                    'company_id' => 'required|integer', 
                    'company_name' => 'required', 
                    'feedback_day' => 'integer|nullable',
                    'company_email' => 'string|email|max:100|nullable',
                    'company_address' => 'required|string',
                    'company_pin' => 'required|string|min:5',
                    'company_city' => 'required',
                    'company_state' => 'required|integer',
                    'company_country' => 'required|integer',
                    'company_gstinno' => 'string|nullable'
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
                    'company_name' => 'required', 
                    'feedback_day' => 'integer|nullable',
                    'company_email' => 'string|email|max:100|nullable',
                    'company_address' => 'required|string',
                    'company_pin' => 'required|string|min:5',
                    'company_city' => 'required',
                    'company_state' => 'required|integer',
                    'company_country' => 'required|integer',
                    'company_gstinno' => 'string|nullable'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
        }

        $brokercompany->b_company_id = $request->input('company_id');
        $brokercompany->b_company_name = $request->input('company_name');
        $brokercompany->b_avg_feedback_day = $request->input('feedback_day');
        $brokercompany->b_company_email = $request->input('company_email');
        $brokercompany->b_company_address = $request->input('company_address');
        $brokercompany->b_company_pin = $request->input('company_pin');
        $brokercompany->b_company_city = $request->input('company_city');
        $brokercompany->b_company_state = $request->input('company_state');
        $brokercompany->b_company_country = $request->input('company_country');
        $brokercompany->b_company_GSTIN = $request->input('company_gstinno');

        if($brokercompany->save())
        {
            return new BrokercompanyResource($brokercompany);
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
        $brokerCompanyList = Brokercompany::findOrFail($id);

        return new BrokercompanyResource($brokerCompanyList);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}
