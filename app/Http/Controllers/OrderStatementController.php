<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class OrderStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return the form view that will display the necessary details to submit a query in order to generate the Statement

        //For fetching the Mother companies which are directly related to the company
        //Not well tested query might generate problem
        $motherCompanyList = DB::select('select mcm.m_company_id,mcm.m_company_name from tbl_mother_company_mast mcm INNER JOIN (select DISTINCT(m_company_id) as m_company_id from tbl_mother_sub_company_relation where s_company_id IS null) rs on rs.m_company_id = mcm.m_company_id');

        //Fetching the subcompany list
        $subCompanyList = DB::select('select scm.s_company_id,scm.s_company_name from tbl_sub_company_mast scm INNER JOIN (select DISTINCT(s_company_id) as s_company_id from tbl_mother_sub_company_relation) rs on rs.s_company_id = scm.s_company_id');

        //Create view and and Send these two variables in order to show the datas
        return view('orderstatement.showform',['mothercompanylist' => $motherCompanyList, 'subcompanylist' => $subCompanyList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showform(Request $request)
    {
        // return $request;
        $statement = [];
        $companyType = $request->input('company_type');
        $empid = Auth::user()->empid;
        $emptype = Auth::user()->role_id;
        if($emptype == "1")
        {
            $queryModificationBasedOnEmpType = "";
        }
        else
        {
            $queryModificationBasedOnEmpType = "and po.current_employee_hirearchy like '%$empid%'";
        }
        switch($companyType)
        {
            case 'mother':
                $motherCompanyId = $request->input('m_company_id');
                $startDate = strtotime($request->input('start_date'));
                $endDate = strtotime($request->input('end_date'));
                if($startDate<$endDate)
                {
                    $statement = DB::select("select po.order_id,po.order_date,po.application_no,(SELECT cm.customer_name from tbl_customer_mast cm where cm.customer_id = po.customer_id) as 'customer_name', po.d_case_taker_id, (SELECT concat(em.emp_first_name, IFNULL(concat(' ',  em.emp_middle_name),''), IFNULL(concat(' ',  em.emp_last_name),'')) from tbl_employee_mast em where em.emp_id = po.d_case_taker_id) as emp_name, (SELECT mcm.m_company_name from tbl_mother_company_mast mcm where mcm.m_company_id = po.handover_to_mother_company_id) as 'company_name', (SELECT pm.policy_name from tbl_policy_mast pm where pm.policy_id = po.policy_id) as 'policy_name', po.amount, ROUND((po.amount*(case when (po.handover_to_sub_company_id is null) THEN (select mscr.deal_percentage from tbl_mother_sub_company_relation mscr where mscr.m_company_id = po.handover_to_mother_company_id and mscr.s_company_id is null) ELSE (select mscr.deal_percentage from tbl_mother_sub_company_relation mscr where mscr.m_company_id = po.handover_to_mother_company_id and mscr.s_company_id = po.handover_to_sub_company_id) END))/100,2) as profit from tbl_policy_order po where po.handover_to_company_type = ? and po.handover_to_mother_company_id = ? and po.order_date between ? AND ? $queryModificationBasedOnEmpType", [$companyType,$motherCompanyId,date('Y-m-d H:i:s', $startDate),date('Y-m-d H:i:s', $endDate)]);  
                }
                else
                {

                }
            break;
            case 'sub':
                $subCompanyId = $request->input('s_company_id');
                $motherCompanyId = $request->input('m_company_id');
                $startDate = strtotime($request->input('start_date'));
                $endDate = strtotime($request->input('end_date'));
                if(($startDate)<($endDate))
                {
                    if(is_null($motherCompanyId))
                    {
                        $statement = DB::select("select po.order_id,po.order_date,po.application_no,(SELECT cm.customer_name from tbl_customer_mast cm where cm.customer_id = po.customer_id) as 'customer_name', po.d_case_taker_id, (SELECT concat(em.emp_first_name, IFNULL(concat(' ',  em.emp_middle_name),''), IFNULL(concat(' ',  em.emp_last_name),'')) from tbl_employee_mast em where em.emp_id = po.d_case_taker_id) as emp_name, (SELECT mcm.m_company_name from tbl_mother_company_mast mcm where mcm.m_company_id = po.handover_to_mother_company_id) as 'company_name', (SELECT bcm.b_company_name from tbl_broker_company_mast bcm where bcm.b_company_id = po.i_case_taker_id) as 'broker_company_name', (SELECT scm.s_company_name from tbl_sub_company_mast scm where scm.s_company_id = po.handover_to_sub_company_id) as 'sub_company_name', (SELECT pm.policy_name from tbl_policy_mast pm where pm.policy_id = po.policy_id) as 'policy_name', po.amount, ROUND((po.amount*(case when (po.handover_to_sub_company_id is null) THEN (select mscr.deal_percentage from tbl_mother_sub_company_relation mscr where mscr.m_company_id = po.handover_to_mother_company_id and mscr.s_company_id is null) ELSE (select mscr.deal_percentage from tbl_mother_sub_company_relation mscr where mscr.m_company_id = po.handover_to_mother_company_id and mscr.s_company_id = po.handover_to_sub_company_id) END))/100,2) as profit, IF(po.i_case_taker_id is null,(''),ROUND((po.amount*(SELECT bcr.deal_percentage from tbl_broker_company_relation bcr where bcr.b_company_id = po.i_case_taker_id))/100,2)) as broker_payment from tbl_policy_order po where po.handover_to_company_type = ? and po.handover_to_sub_company_id = ? and po.order_date between ? AND ? $queryModificationBasedOnEmpType", [$companyType,$subCompanyId,date('Y-m-d H:i:s', $startDate),date('Y-m-d H:i:s', $endDate)]);
                        
                    }
                    else
                    {
                        $statement = DB::select("select po.order_id,po.order_date,po.application_no,(SELECT cm.customer_name from tbl_customer_mast cm where cm.customer_id = po.customer_id) as 'customer_name', po.d_case_taker_id, (SELECT concat(em.emp_first_name, IFNULL(concat(' ',  em.emp_middle_name),''), IFNULL(concat(' ',  em.emp_last_name),'')) from tbl_employee_mast em where em.emp_id = po.d_case_taker_id) as emp_name, (SELECT mcm.m_company_name from tbl_mother_company_mast mcm where mcm.m_company_id = po.handover_to_mother_company_id) as 'company_name', (SELECT bcm.b_company_name from tbl_broker_company_mast bcm where bcm.b_company_id = po.i_case_taker_id) as 'broker_company_name', (SELECT scm.s_company_name from tbl_sub_company_mast scm where scm.s_company_id = po.handover_to_sub_company_id) as 'sub_company_name', (SELECT pm.policy_name from tbl_policy_mast pm where pm.policy_id = po.policy_id) as 'policy_name', po.amount, ROUND((po.amount*(case when (po.handover_to_sub_company_id is null) THEN (select mscr.deal_percentage from tbl_mother_sub_company_relation mscr where mscr.m_company_id = po.handover_to_mother_company_id and mscr.s_company_id is null) ELSE (select mscr.deal_percentage from tbl_mother_sub_company_relation mscr where mscr.m_company_id = po.handover_to_mother_company_id and mscr.s_company_id = po.handover_to_sub_company_id) END))/100,2) as profit, IF(po.i_case_taker_id is null,(''),ROUND((po.amount*(SELECT bcr.deal_percentage from tbl_broker_company_relation bcr where bcr.b_company_id = po.i_case_taker_id))/100,2)) as broker_payment from tbl_policy_order po where po.handover_to_company_type = ? and po.handover_to_sub_company_id = ? and po.handover_to_mother_company_id = ? and po.order_date between ? AND ? $queryModificationBasedOnEmpType", [$companyType,$subCompanyId,$motherCompanyId,date('Y-m-d H:i:s', $startDate),date('Y-m-d H:i:s', $endDate)]);
                    }
                }
                else
                {
                    
                }
            break;
            default:
                $startDate = strtotime($request->input('start_date'));
                $endDate = strtotime($request->input('end_date'));
                if(($startDate)<($endDate))
                {
                    $statement = DB::select("select po.order_id,po.order_date,po.application_no,(SELECT cm.customer_name from tbl_customer_mast cm where cm.customer_id = po.customer_id) as 'customer_name', po.d_case_taker_id, (SELECT concat(em.emp_first_name, IFNULL(concat(' ',  em.emp_middle_name),''), IFNULL(concat(' ',  em.emp_last_name),'')) from tbl_employee_mast em where em.emp_id = po.d_case_taker_id) as emp_name, (SELECT mcm.m_company_name from tbl_mother_company_mast mcm where mcm.m_company_id = po.handover_to_mother_company_id) as 'company_name', (SELECT bcm.b_company_name from tbl_broker_company_mast bcm where bcm.b_company_id = po.i_case_taker_id) as 'broker_company_name', (SELECT scm.s_company_name from tbl_sub_company_mast scm where scm.s_company_id = po.handover_to_sub_company_id) as 'sub_company_name', (SELECT pm.policy_name from tbl_policy_mast pm where pm.policy_id = po.policy_id) as 'policy_name', po.amount, ROUND((po.amount*(case when (po.handover_to_sub_company_id is null) THEN (select mscr.deal_percentage from tbl_mother_sub_company_relation mscr where mscr.m_company_id = po.handover_to_mother_company_id and mscr.s_company_id is null) ELSE (select mscr.deal_percentage from tbl_mother_sub_company_relation mscr where mscr.m_company_id = po.handover_to_mother_company_id and mscr.s_company_id = po.handover_to_sub_company_id) END))/100,2) as profit,IF(po.i_case_taker_id is null,(''),ROUND((po.amount*(SELECT bcr.deal_percentage from tbl_broker_company_relation bcr where bcr.b_company_id = po.i_case_taker_id))/100,2)) as broker_payment from tbl_policy_order po where po.order_date between ? AND ? $queryModificationBasedOnEmpType", [date('Y-m-d H:i:s', $startDate),date('Y-m-d H:i:s', $endDate)]);
                }
                else
                {

                }
        }

        //Have to make a complex query about how to fetch the deal percent The below query will check
        //and make the profit based on current deal percent only
                

        return view('orderstatement.showstatement',['statements' => $statement]);
    }

    public function hierarchy($orderid) 
    {
        $empid = Auth::user()->empid;
        $hierarchyJSON = DB::table('tbl_policy_order')->select('current_employee_hirearchy')->where('order_id','=',$orderid)->where('current_employee_hirearchy','like',"%{$empid}%")->get();
        $hierarchy = json_decode($hierarchyJSON[0]->current_employee_hirearchy);
        $hierarchyReturnJSON = [];
        foreach($hierarchy as $emp)
        {
            $emp->empname = DB::select("SELECT concat(em.emp_first_name, IFNULL(concat(' ',  em.emp_middle_name),''), IFNULL(concat(' ',  em.emp_last_name),'')) as empname from tbl_employee_mast em where em.emp_id = '$emp->empid'")[0]->empname;
            if($emp->empid == $empid)
            {
                $emp->isCurrent = "1";
            }
            else
            {
                $emp->isCurrent = "0";
            }
            array_push($hierarchyReturnJSON,$emp);
        }
        return $hierarchyReturnJSON;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
