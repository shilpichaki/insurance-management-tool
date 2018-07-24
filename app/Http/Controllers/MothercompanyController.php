<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mothercompany;
use Validator;
use App\Http\Resources\MothercompanyResource;

class MothercompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motherCompanyList = Mothercompany::all();
        if(empty($motherCompanyList))
        {
            $result = array("status"=>0);
        }
        else
        {
            $result = array("status"=>1,"data"=>$motherCompanyList);
        }
        return MothercompanyResource::collection($motherCompanyList);
        // return $motherCompanyList;
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
