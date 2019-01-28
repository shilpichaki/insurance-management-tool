<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Policy extends Model
{
    Protected $table = "tbl_policy_mast";
    public $primaryKey = "user_id";
    public $timestamps = true;
    protected $fillable = [
        'policy_id', 'user_id', 'employee_id', 'policy_no', 'policy_name', 'm_company_id', 'plan_mode', 'premium_time', 'maturity_time', 'amount', 'issuing_status'
    ];
    

    public function motherCompany()
    {
        return $this->belongsTo('App\Mothercompany', 'm_company_id', 'm_company_id');
    }

    //sub broker details
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }

    public function subBroker()
    {
        return $this->belongsTo('App\User', 'user_id', 'empid');
    }
}
