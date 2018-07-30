<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Validator;

use App\Util;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all()->toArray();
        return $customer;
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
        $customer = $request->isMethod('put') ? Customer::findOrFail($request->customer_id) : new Customer;

        if($request->isMethod('put'))
        {
            $validator = Validator::make($request->all(), 
                [
                    'customer_id' => 'required|integer', 
                    'customer_name' => 'required|string|max:100', 
                    'customer_dob' => 'required|date',
                    'customer_phno' => 'string|max:15',
                    'customer_address' => 'required|string|max:100'
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
                    'customer_name' => 'required|string|max:100', 
                    'customer_dob' => 'required|date',
                    'customer_phno' => 'string|max:15',
                    'customer_address' => 'required|string|max:100'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
        }

        $customer->customer_id = $request->input('customer_id');
        $customer->customer_name = $request->input('customer_name');
        $customer->customer_dob = Util::mysqlDateTimeConverter($request->input('customer_dob'));
        $customer->customer_phno = $request->input('customer_phno');
        $customer->customer_address = $request->input('customer_address');

        if($customer->save())
        {
            return $customer;
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
        $customer = Customer::findOrFail($id);
        return $customer;
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
