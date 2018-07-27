<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brokercompany extends Model
{
    Protected $table = "tbl_broker_company_mast";
    public $primaryKey = "b_company_id";
    public $timestamps = true;

    public function country()
    {
        return $this->belongsTo('App\Country', 'b_company_country', 'country_id');
    }
    public function state()
    {
        return $this->belongsTo('App\State', 'b_company_state', 'state_id');
    }
}
