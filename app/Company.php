<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $primaryKey = "company_id";
    public $timestamps = true;

    public function country()
    {
        return $this->belongsTo('App\Country', 'company_country', 'country_id');
    }
    public function state()
    {
        return $this->belongsTo('App\State', 'company_state', 'state_id');
    }
}
