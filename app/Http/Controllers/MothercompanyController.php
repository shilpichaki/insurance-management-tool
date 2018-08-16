<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mothercompany;
use Validator;
use App\Http\Resources\MothercompanyResource;
use DB;

class MothercompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motherCompanyList = Mothercompany::paginate(15);
        // return MothercompanyResource::collection($motherCompanyList);
        return view('mothercompany.index', ['motherCompanyList' => $motherCompanyList]);
    }

    public function create()
    {
        $country_data =DB::table('countries')->select('country_id','country_name')->get();
        $state_data =DB::table('states')->select('state_id','state_name')->get();
        return view('mothercompany.create',compact('state_data','country_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mothercompany = $request->isMethod('put') ? Mothercompany::findOrFail($request->company_id) : new Mothercompany;

        if($request->isMethod('put'))
        {
            $validator = Validator::make($request->all(), 
                [
                    'company_id' => 'required|integer', 
                    'company_name' => 'required', 
                    'feedback_day' => 'integer|nullable',
                    'company_email' => 'string|email|max:100|nullable',
                    'company_address' => 'required|string',
                    'company_pin' => 'required|string|max:7',
                    'company_city' => 'required|integer',
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
                    'company_pin' => 'required|string|max:7',
                    'company_city' => 'required|integer',
                    'company_state' => 'required|integer',
                    'company_country' => 'required|integer',
                    'company_gstinno' => 'string|nullable'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
        }

        $mothercompany->m_company_id = $request->input('company_id');
        $mothercompany->m_company_name = $request->input('company_name');
        $mothercompany->m_avg_feedback_day = $request->input('feedback_day');
        $mothercompany->m_company_email = $request->input('company_email');
        $mothercompany->m_company_address = $request->input('company_address');
        $mothercompany->m_company_pin = $request->input('company_pin');
        $mothercompany->m_company_city = $request->input('company_city');
        $mothercompany->m_company_state = $request->input('company_state');
        $mothercompany->m_company_country = $request->input('company_country');
        $mothercompany->m_company_GSTIN = $request->input('company_gstinno');

        if($mothercompany->save())
        {
            return new MothercompanyResource($mothercompany);
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
        $motherCompanyList = Mothercompany::findOrFail($id);

        return new MothercompanyResource($motherCompanyList);
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
