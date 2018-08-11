<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Validator;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyList = Company::all()->toArray();
        return $companyList;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statelist = DB::select("select state_id, state_name from states");
        $countrylist = DB::select("select country_id,country_name from countries");
        return view('company.create', compact('statelist','countrylist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = $request->isMethod('put') ? Company::findOrFail($request->company_id) : new Company;

        if($request->isMethod('put'))
        {
            $validator = Validator::make($request->all(), 
                [
                    'company_id' => 'required|integer', 
                    'company_name' => 'required',
                    'company_address' => 'required|string',
                    'company_pin' => 'required|string|max:7',
                    'company_city' => 'required',
                    'company_state' => 'required|integer',
                    'company_country' => 'required|integer',
                    'company_gstinno' => 'string|nullable',
                    'company_contact_no' => 'string|nullable',
                    'company_contact_person' => 'string|nullable',
                    'company_CIN' => 'string|nullable',
                    'company_PAN' => 'string|nullable'
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
                    'company_address' => 'required|string',
                    'company_pin' => 'required|string|max:7',
                    'company_city' => 'required',
                    'company_state' => 'required|integer',
                    'company_country' => 'required|integer',
                    'company_gstinno' => 'string|nullable',
                    'company_contact_no' => 'string|nullable',
                    'company_contact_person' => 'string|nullable',
                    'company_CIN' => 'string|nullable',
                    'company_PAN' => 'string|nullable'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
        }

        $company->company_id = $request->input('company_id');
        $company->company_name = $request->input('company_name');
        $company->company_address = $request->input('company_address');
        $company->company_pin = $request->input('company_pin');
        $company->company_city = $request->input('company_city');
        $company->company_state = $request->input('company_state');
        $company->company_country = $request->input('company_country');
        $company->company_GSTIN = $request->input('company_gstinno');
        $company->company_contact_no = $request->input('company_contact_no');
        $company->company_contact_person = $request->input('company_contact_person');
        $company->company_CIN = $request->input('company_CIN');
        $company->company_PAN = $request->input('company_PAN');

        if($company->save())
        {
            return $company;
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
        $companyList = Company::findOrFail($id);

        return $companyList;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statelist = DB::select("select state_id, state_name from states");
        $countrylist = DB::select("select country_id,country_name from countries");
        $company = Company::where('company_id',$id)->first();
        return view('company.edit', compact('id','statelist','countrylist', 'company'));
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
