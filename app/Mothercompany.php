<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountryController;

class Mothercompany extends Model
{
    Protected $table = "tbl_mother_company_mast";
    public $primaryKey = "m_company_id";
    public $timestamps = true;

    public function country()
    {
        return $this->belongsTo('App\Country', 'm_company_country', 'country_id');
    }
    public function state()
    {
        return $this->belongsTo('App\State', 'm_company_state', 'state_id');
    }
    // protected $fillable = [
    //     'm_company_name', '	m_avg_feedback_day', 'm_company_email','m_company_address','m_company_pin','m_company_city','m_company_state','m_company_country','m_company_GSTIN'
    // ];
}
