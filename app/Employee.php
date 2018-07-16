<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    Protected $table = "tbl_employee_mast";
    public $primaryKey = "emp_id";
    public $timestamps = true;
    protected $fillable = [
        'emp_id', 'emp_first_name', 'emp_middle_name','emp_last_name','emp_dob','emp_email','emp_phno','emp_desg_id','emp_reports_to','emp_status',
    ];
}
