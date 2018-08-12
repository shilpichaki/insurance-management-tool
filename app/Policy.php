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
}
