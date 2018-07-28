<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mothersubcompanyrelations;
use Validator;
use DB;

use App\Util;

class MothersubcompanyrelationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motherSubCompanyRelation = Mothersubcompanyrelations::all()->toArray();
        return $motherSubCompanyRelation;
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
        $mothersubcompanyrelations = $request->isMethod('put') ? Mothersubcompanyrelations::where('company_relation_id',$request->relation_id)->first() : new Mothersubcompanyrelations;

        if($request->isMethod('put'))
        {
            $validator = Validator::make($request->all(), 
                [
                    'relation_id' => 'required|integer', 
                    'm_company_id' => 'required_without:s_company_id|integer', 
                    's_company_id' => 'required_without:m_company_id|integer',
                    'deal_percentage' => 'required|integer|max:100',

                    //More precisely below 2 fields can be called as Deal percent issue date and Deal percent update date
                    'percent_created' => 'required|date',
                    'percent_updated' => 'nullable|date'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
            
            $mothersubcompanyrelations->company_relation_id = $request->input('relation_id');
            
            if($request->input('percent_updated') == "")
            {
                $array_requested = [
                    'm_company_id' => $request->input('m_company_id'),
                    's_company_id' => $request->input('s_company_id'),
                    'deal_percentage' => $request->input('deal_percentage'),
                    'percent_created' => Util::mysqlDateTimeConverter($request->input('percent_created'))
                ];
            }
            else
            {
                $array_requested = [
                    'm_company_id' => $request->input('m_company_id'),
                    's_company_id' => $request->input('s_company_id'),
                    'deal_percentage' => $request->input('deal_percentage'),
                    'percent_created' => Util::mysqlDateTimeConverter($request->input('percent_created')),
                    'percent_updated' => Util::mysqlDateTimeConverter($request->input('percent_updated'))
                ];
            }
            DB::table('tbl_mother_sub_company_relation')
            ->where('company_relation_id', $request->input('relation_id'))
            ->update($array_requested);
        }
        else
        {
            $validator = Validator::make($request->all(), 
                [
                    'm_company_id' => 'required_without:s_company_id|integer', 
                    's_company_id' => 'required_without:m_company_id|integer',
                    'deal_percentage' => 'required|integer|max:100',

                    //More precisely below 2 fields can be called as Deal percent issue date and Deal percent update date
                    'percent_created' => 'required|date',
                    'percent_updated' => 'nullable|date'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
            //Getting the general values
            $mothersubcompanyrelations->company_relation_id = Mothersubcompanyrelations::max('company_relation_id') + 1;
            $mothersubcompanyrelations->m_company_id = $request->input('m_company_id');
            $mothersubcompanyrelations->s_company_id = $request->input('s_company_id');
            $mothersubcompanyrelations->deal_percentage = $request->input('deal_percentage');
            $mothersubcompanyrelations->percent_created_at = Util::mysqlDateTimeConverter($request->input('percent_created'));
            if($request->input('percent_updated') != "")
            {
                $mothersubcompanyrelations->percent_updated_at = Util::mysqlDateTimeConverter($request->input('percent_updated'));
            }
            //Saving the model
            if($mothersubcompanyrelations->save())
            {
                return $mothersubcompanyrelations;
            }
            else
            {
                return "Not working";
            }
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
        $motherSubCompanyRelation = Mothersubcompanyrelations::where('company_relation_id',$request->relation_id)->first();
        return $motherSubCompanyRelation;
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
