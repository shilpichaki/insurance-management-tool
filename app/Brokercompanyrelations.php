<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brokercompanyrelations extends Model
{
    Protected $table = "tbl_broker_company_relation";
    public $timestamps = true;

    public function brokerCompany()
    {
        return $this->belongsTo('App\Brokercompany', 'b_company_id', 'b_company_id');
    }

}
