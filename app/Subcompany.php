<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcompany extends Model
{
    Protected $table = "tbl_sub_company_mast";
    public $primaryKey = "s_company_id";
    public $timestamps = true;

    public function country()
    {
        return $this->belongsTo('App\Country', 's_company_country', 'country_id');
    }
    public function state()
    {
        return $this->belongsTo('App\State', 's_company_state', 'state_id');
    }
}
