<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brokercompanyrelations;
use Validator;
use DB;

use App\Util;

class BrokercompanyrelationsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brokerCompanyRelation = Brokercompanyrelations::all()->toArray();
        return $brokerCompanyRelation;
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brokercompanylist = DB::select("select b_company_id,b_company_name from tbl_broker_company_mast");
        return view('brelation.create',compact('brokercompanylist'));
    }


    public function store(Request $request)
    {
        $brokercompanyrelations = $request->isMethod('put') ? Brokercompanyrelations::where('company_relation_id',$request->relation_id)->first() : new Brokercompanyrelations;

        if($request->isMethod('put'))
        {
            $validator = Validator::make($request->all(), 
                [
                    'relation_id' => 'required|integer', 
                    'b_company_id' => 'required_without:s_company_id|integer', 
                    'deal_percentage' => 'required|integer|max:100',

                    //More precisely below 2 fields can be called as Deal percent issue date and Deal percent update date
                    'percent_created' => 'required|date',
                    'percent_updated' => 'nullable|date'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
            
            $brokercompanyrelations->company_relation_id = $request->input('relation_id');
            
            if($request->input('percent_updated') == "")
            {
                $array_requested = [
                    'b_company_id' => $request->input('b_company_id'),
                    'deal_percentage' => $request->input('deal_percentage'),
                    'percent_created' => Util::mysqlDateTimeConverter($request->input('percent_created'))
                ];
            }
            else
            {
                $array_requested = [
                    'b_company_id' => $request->input('b_company_id'),
                    'deal_percentage' => $request->input('deal_percentage'),
                    'percent_created' => Util::mysqlDateTimeConverter($request->input('percent_created')),
                    'percent_updated' => Util::mysqlDateTimeConverter($request->input('percent_updated'))
                ];
            }
            DB::table('tbl_broker_company_relation')
            ->where('company_relation_id', $request->input('relation_id'))
            ->update($array_requested);
        }
        else
        {
            $validator = Validator::make($request->all(), 
                [
                    'b_company_id' => 'required_without:s_company_id|integer', 
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
            $brokercompanyrelations->company_relation_id = Brokercompanyrelations::max('company_relation_id') + 1;
            $brokercompanyrelations->b_company_id = $request->input('m_company_id');
            $brokercompanyrelations->deal_percentage = $request->input('deal_percentage');
            $brokercompanyrelations->percent_created_at = Util::mysqlDateTimeConverter($request->input('percent_created'));
            if($request->input('percent_updated') != "")
            {
                $brokercompanyrelations->percent_updated_at = Util::mysqlDateTimeConverter($request->input('percent_updated'));
            }
            //Saving the model
            if( $brokercompanyrelations->save())
            {
                return  $brokercompanyrelations;
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
        $brokerCompanyRelation = Brokercompanyrelations::where('company_relation_id',$request->relation_id)->first();
        return $brokerCompanyRelation;
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brokercompanylist = DB::select("select b_company_id,b_company_name from tbl_broker_company_mast");
        $brokerCompanyRelation = Brokercompanyrelations::where('company_relation_id',$request->relation_id)->first();
        return view('bsrelation.edit',compact('brokercompanylist','brokerCompanyRelation','id'));
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
