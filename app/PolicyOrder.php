<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolicyOrder extends Model
{
    Protected $table = "tbl_policy_order";
    public $primaryKey = "order_id";
    public $timestamps = true;

    //Customer Details
    public function customer_details()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'customer_id');
    }

    //For Case taker details
    public function employee_details()
    {
        return $this->belongsTo('App\Employee', 'd_case_taker_id', 'emp_id');
    }
    public function broker_company_details()
    {
        return $this->belongsTo('App\Brokercompany', 'i_case_taker_id', 'b_company_id');
    }

    //For the handver to company details
    public function mother_company_details()
    {
        return $this->belongsTo('App\Mothercompany', 'handover_to_mother_company_id', 'm_company_id');
    }
    public function sub_company_details()
    {
        return $this->belongsTo('App\Subcompany', 'handover_to_sub_company_id', 's_company_id');
    }

    //Policy related data
    public function policy_details()
    {
        return $this->belongsTo('App\Policy', 'policy_id', 'policy_id');
    }
    public function policy_status_details()
    {
        return $this->belongsTo('App\PolicyStatus', 'policy_status_id', 'policy_status_id');
    }

    //For Nominee's relation details
    public function nominee_relation_details()
    {
        return $this->belongsTo('App\Familyrelation', 'nominee_relation_id', 'state_id');
    }
}
