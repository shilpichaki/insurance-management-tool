<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mothersubcompanyrelations;
// use App\Mothercompany;
// use App\Subcompany;
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
        $motherSubCompanyRelation = Mothersubcompanyrelations::all();
        return view('msrelation.index')->with(['motherSubCompanyRelation' => $motherSubCompanyRelation]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mothercompanylist = DB::select("select m_company_id,m_company_name from tbl_mother_company_mast");
        $subcompanylist = DB::select("select s_company_id,s_company_name from tbl_sub_company_mast");
        return view('msrelation.create',compact('mothercompanylist','subcompanylist'));
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
                    'm_company_id' => 'required_without:s_company_id|integer|nullable', 
                    's_company_id' => 'required_without:m_company_id|integer|nullable',
                    'deal_percentage' => 'required|integer|max:100',

                    //More precisely below 2 fields can be called as Deal percent issue date and Deal percent update date
                    'percent_created' => 'required|date',
                    'percent_updated' => 'nullable|date'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }

            if(empty($request->input('s_company_id')))
            {
                $relationAlreadyExists = DB::select("select company_relation_id from tbl_mother_sub_company_relation where m_company_id = ?",[$request->input('m_company_id')]);
                if(!empty($relationAlreadyExists))
                {
                    if($relationAlreadyExists[0]->company_relation_id != $request->input('relation_id'))
                    {
                        return $request->input('relation_id');
                    }
                }

            }
            else
            {
                $relationAlreadyExists = DB::select("select company_relation_id from tbl_mother_sub_company_relation where m_company_id = ? and s_company_id = ?",[$request->input('m_company_id'),$request->input('s_company_id')]);
                if(!empty($relationAlreadyExists))
                {
                    if($relationAlreadyExists[0]->company_relation_id != $request->input('relation_id'))
                    {
                        return $request->input('relation_id');
                    }
                }
            }
            
            $mothersubcompanyrelations->company_relation_id = $request->input('relation_id');
            
            if($request->input('percent_updated') == "")
            {
                $array_requested = [
                    'm_company_id' => $request->input('m_company_id'),
                    's_company_id' => $request->input('s_company_id'),
                    'deal_percentage' => $request->input('deal_percentage'),
                    'percent_created_at' => Util::mysqlDateTimeConverter($request->input('percent_created'))
                ];
            }
            else
            {
                $array_requested = [
                    'm_company_id' => $request->input('m_company_id'),
                    's_company_id' => $request->input('s_company_id'),
                    'deal_percentage' => $request->input('deal_percentage'),
                    'percent_created_at' => Util::mysqlDateTimeConverter($request->input('percent_created')),
                    'percent_updated_at' => Util::mysqlDateTimeConverter($request->input('percent_updated'))
                ];
            }
            $returnData = DB::table('tbl_mother_sub_company_relation')
            ->where('company_relation_id', $request->input('relation_id'))
            ->update($array_requested);

            if($returnData)
            {
                return redirect('/msrelation')->with('success', 'Realation has been updated!!');
            }
        }
        else
        {
            $validator = Validator::make($request->all(), 
                [
                    'm_company_id' => 'required_without:s_company_id|integer|nullable', 
                    's_company_id' => 'required_without:m_company_id|integer|nullable',
                    'deal_percentage' => 'required|integer|max:100',

                    //More precisely below 2 fields can be called as Deal percent issue date and Deal percent update date
                    'percent_created' => 'required|date',
                    'percent_updated' => 'nullable|date'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }

            //Validating if there is any duplicate relation or not
            if(empty($request->input('s_company_id')))
            {
                $relationAlreadyExists = DB::select("select company_relation_id from tbl_mother_sub_company_relation where m_company_id = ?",[$request->input('m_company_id')]);
                if(!empty($relationAlreadyExists))
                {
                    return $relationAlreadyExists;
                }

            }
            else
            {
                $relationAlreadyExists = DB::select("select company_relation_id from tbl_mother_sub_company_relation where m_company_id = ? and s_company_id = ?",[$request->input('m_company_id'),$request->input('s_company_id')]);
                if(!empty($relationAlreadyExists))
                {
                    return $relationAlreadyExists;
                }
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
                return redirect('/msrelation')->with('success', 'Realation has been created!!');
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
        // $motherCompanyList = Mothercompany::all()->toArray();
        // $subCompanyList = Subcompany::all()->toArray();
        $mothercompanylist = DB::select("select m_company_id,m_company_name from tbl_mother_company_mast");
        $subcompanylist = DB::select("select s_company_id,s_company_name from tbl_sub_company_mast");
        $motherSubCompanyRelation = Mothersubcompanyrelations::where('company_relation_id',$id)->first();
        return view('msrelation.edit',compact('mothercompanylist','subcompanylist','motherSubCompanyRelation','id'));
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
