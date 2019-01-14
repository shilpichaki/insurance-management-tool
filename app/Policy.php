<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    Protected $table = "tbl_policy_mast";
    public $primaryKey = "policy_id";
    public $timestamps = true;
    

    public function motherCompany()
    {
        return $this->belongsTo('App\Mothercompany', 'm_company_id', 'm_company_id');
    }

    //sub broker details
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function subBroker()
    {
        return $this->belongsTo('App\User');
    }
}
