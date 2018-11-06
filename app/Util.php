<?php
namespace App;

use DB;

Class Util
{
    public static function mysqlDateTimeConverter($date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }

    public static function htmlDateConverter($date)
    {
        return date('Y-m-d', strtotime($date));
    }

    public static function phpDateFetch($date)
    {
        return date('d/m/Y', strtotime($date));
    }

    public static function phpTimeFetchFormatTwelveHour($date)
    {
        return date('g:i A', strtotime($date));
    }

    public static function phpTimeFetchFormatTwentyFourHour($date)
    {
        return date('H:i', strtotime($date));
    }

    public static function addMinutes($dateTime,$noOfMinutes)
    {
        $time = strtotime($dateTime);
        return date('Y-m-d H:i:s', strtotime('+' . $noOfMinutes . ' minutes',$time));
    }

    public static function employeeHierarchyListBasedOnEmpID($empid)
    {
        $empdtl = DB::select("select '$empid' as 'empid',(select dm.designation_name from tbl_designation_mast dm WHERE dm.designation_id = em.emp_desg_id) as 'empdesg' from tbl_employee_mast em where em.emp_id = '$empid'");
        $emp = DB::select("select emp_id,emp_reports_to from tbl_employee_mast where emp_id = '$empid'");
        if(!empty($emp))
        {
            if($emp[0]->emp_reports_to == "0")
            {
                return $empdtl;
            }
            else
            {            
                $retData = self::employeeHierarchyListBasedOnEmpID($emp[0]->emp_reports_to);
                return array_merge($retData,$empdtl);
            }
        }
    }

}


?>