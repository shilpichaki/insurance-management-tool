<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PolicyStatus;
use Validator;

class PolicystatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policyStatus = PolicyStatus::all()->toArray();
        return $policyStatus;
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
        $policyStatus = $request->isMethod('put') ? PolicyStatus::findOrFail($request->policy_status_id) : new PolicyStatus;

        if($request->isMethod('put'))
        {
            $validator = Validator::make($request->all(), 
                [
                    'policy_status_id' => 'required|integer', 
                    'policy_status_name' => 'required|string|max:50', 
                    'policy_status_des' => 'required|string'
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
                    'policy_status_name' => 'required|string|max:50', 
                    'policy_status_des' => 'required|string'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
        }

        $policyStatus->policy_status_id = $request->input('policy_status_id');
        $policyStatus->policy_status_name = $request->input('policy_status_name');
        $policyStatus->policy_status_des = $request->input('policy_status_des');

        if($policyStatus->save())
        {
            return $policyStatus;
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
        $policyStatus = PolicyStatus::findOrFail($id);
        return $policyStatus;
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
