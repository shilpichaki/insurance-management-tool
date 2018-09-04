<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcompany;
use Validator;
use App\Http\Resources\SubcompanyResource;
use DB;

class SubcompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCompanyList = Subcompany::paginate(15);
        return SubcompanyResource::collection($subCompanyList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country_data =DB::table('countries')->select('country_id','country_name')->get();
        $state_data =DB::table('states')->select('state_id','state_name')->get();
        return view('subcompany.create',compact('state_data','country_data'));
    }

    public function edit($id)
    {
        // $motherCompanyList = Mothercompany::all()->toArray();
        // $subCompanyList = Subcompany::all()->toArray();
        $country_data =DB::table('countries')->select('country_id','country_name')->get();
        $state_data =DB::table('states')->select('state_id','state_name')->get();
        $subcompany = Subcompany::findOrFail($id);
        return view('subcompany.edit',compact('state_data','country_data','subcompany','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcompany = $request->isMethod('put') ? Subcompany::findOrFail($request->company_id) : new Subcompany;

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

        $subcompany->s_company_id = $request->input('company_id');
        $subcompany->s_company_name = $request->input('company_name');
        $subcompany->s_avg_feedback_day = $request->input('feedback_day');
        $subcompany->s_company_email = $request->input('company_email');
        $subcompany->s_company_address = $request->input('company_address');
        $subcompany->s_company_pin = $request->input('company_pin');
        $subcompany->s_company_city = $request->input('company_city');
        $subcompany->s_company_state = $request->input('company_state');
        $subcompany->s_company_country = $request->input('company_country');
        $subcompany->s_company_GSTIN = $request->input('company_gstinno');

        if($subcompany->save())
        {
            return new SubcompanyResource($subcompany);
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
        $subCompanyList = Subcompany::findOrFail($id);

        return new SubcompanyResource($subCompanyList);
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
