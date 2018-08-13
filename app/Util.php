<?php
namespace App;

use DB;

Class Util
{
    public static function mysqlDateTimeConverter($date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }

    public static function addMinutes($dateTime,$noOfMinutes)
    {
        $time = strtotime($dateTime);
        return date('Y-m-d H:i:s', strtotime('+' . $noOfMinutes . ' minutes',$time));
    }

    public static function employeeHierarchyListBasedOnEmpID($empid)
    {
        $emplist = DB::select("select emp_id,emp_reports_to from tbl_employee_mast");
    }
}


?>