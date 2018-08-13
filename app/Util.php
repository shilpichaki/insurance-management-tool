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
        $empdtl = DB::select("select '$empid' as 'empid',(select dm.designation_name from tbl_designation_mast dm WHERE dm.designation_id = em.emp_desg_id) as 'empdesg' from tbl_employee_mast em where em.emp_id = '$empid'");
        $hierarchy = ($empdtl);
        $emplist = DB::select("select emp_id,emp_reports_to from tbl_employee_mast");
        foreach($emplist as $emp)
        {
            if($emp->emp_id == $empid)
            {
                if($emp->emp_reports_to == "0")
                {
                    return array_merge(array_merge($hierarchy,$hierarchy),$hierarchy);
                }
                else
                {
                    
                    $retData = $this->getChild($emp->emp_reports_to);
                    echo $retData;
                    exit();
                    // array_push($retData,$hierarchy);
                    // return $retData;
                }
                break;
            }
        }
    }

    public function getChild($empid)
    {
        $empdtl = DB::select("select '$empid' as 'empid',(select dm.designation_name from tbl_designation_mast dm WHERE dm.designation_id = em.emp_desg_id) as 'empdesg' from tbl_employee_mast em where em.emp_id = '$empid'");
        $hierarchy = ($empdtl);
        $emplist = DB::select("select emp_id,emp_reports_to from tbl_employee_mast");
        foreach($emplist as $emp)
        {
            if($emp->emp_id == $empid)
            {
                if($emp->emp_reports_to == "0")
                {
                    return ($hierarchy);
                }
                else
                {
                    $retData = $this->getChild($emp->emp_reports_to);
                    return array_merge($retData,$hierarchy);
                }
            }
        }
        // return "Heisenberg";
    }

    public static function name() {
        return "Heisenberg";
    }

}


?>