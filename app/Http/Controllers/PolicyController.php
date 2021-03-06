<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Policy;
use Validator;
use DB;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(Auth::user()->role->name == "SpecialAdmin")
        // {
        //     $policies = Policy::with('subBroker')->get();
            
        //     return view('policymaster.index')->with(['policies' => $policies]);
        // }
        $policies = Policy::all();
        return view('policymaster.index')->with(['policies' => $policies]);
        // return $policy;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role->name == "SpecialAdmin")
        {
            $subBrokers = DB::select("select emp_id,emp_first_name,emp_last_name from tbl_employee_mast");
            // dd($subBrokers);
            $mothercompanylist = DB::select("select m_company_id,m_company_name from tbl_mother_company_mast");
            return view('policymaster.create',compact('mothercompanylist', 'subBrokers'));
        }
        else
        {
            $mothercompanylist = DB::select("select m_company_id,m_company_name from tbl_mother_company_mast");
            return view('policymaster.create',compact('mothercompanylist', 'subBrokers'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $policy = $request->isMethod('put') ? Policy::findOrFail($request->policy_id) : new Policy;

        if($request->isMethod('put'))
        {
            $validator = Validator::make($request->all(), 
                [
                    'user_id' => 'string|max:50',
                    'policy_id' => 'required|integer', 
                    'policy_no' => 'required|string|max:100', 
                    'policy_name' => 'required|string',
                    'm_company_id' => 'integer|max:15',
                    'plan_mode' => 'required|string|max:100',
                    'premium_time' => 'required|integer',
                    'maturity_time' => 'required|integer',
                    'amount' => 'required|regex:/^\d{1,18}(\.\d{1,2})?$/'
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
                    'user_id' => 'string|max:50',
                    'policy_no' => 'required|string|max:100', 
                    'policy_name' => 'required|string',
                    'm_company_id' => 'integer|max:15',
                    'plan_mode' => 'required|string|max:100',
                    'premium_time' => 'required|integer',
                    'maturity_time' => 'required|integer',
                    'amount' => 'required|regex:/^\d{1,18}(\.\d{1,2})?$/'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
        }

        $policy->policy_id = $request->input('policy_id');
        $policy->user_id = $request->input('user_id');
        $policy->employee_id = $request->input('emp_id');
        $policy->policy_no = $request->input('policy_no');
        $policy->policy_name = $request->input('policy_name');
        $policy->m_company_id = $request->input('m_company_id');
        $policy->plan_mode = $request->input('plan_mode');
        $policy->premium_time = $request->input('premium_time');
        $policy->maturity_time = $request->input('maturity_time');
        $policy->amount = $request->input('amount');
        $policy->issuing_status = $request->input('status');

        if($policy->save())
        {
            return redirect('/policy');
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
        $policy = Policy::findOrFail($id);
        return $policy;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role->name == "SpecialAdmin")
        {
            $subBrokers = DB::select("select emp_id,emp_first_name,emp_last_name from tbl_employee_mast");
            // dd($subBrokers);
            $mothercompanylist = DB::select("select m_company_id,m_company_name from tbl_mother_company_mast");
            $policyMaster = Policy::where('policy_id',$id)->first();
            return view('policymaster.edit',compact('subBrokers','mothercompanylist','policyMaster','id'));
        }
        else
        {
            $mothercompanylist = DB::select("select m_company_id,m_company_name from tbl_mother_company_mast");
            $policyMaster = Policy::where('policy_id',$id)->first();
            return view('policymaster.edit',compact('mothercompanylist','policyMaster','id'));
        }
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
