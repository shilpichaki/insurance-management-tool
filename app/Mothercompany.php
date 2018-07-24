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

    public function company($id)
    {
        $countryDetails = new CountryController;
        $country = new Country;
        $country = $countryDetails->show($id);
        
        return $country;
    }
    public function state($id)
    {
        $stateDetails = new StateController;
        $state = new State;
        return $stateDetails->show($id);
        
        return $state;
    }
    // protected $fillable = [
    //     'm_company_name', '	m_avg_feedback_day', 'm_company_email','m_company_address','m_company_pin','m_company_city','m_company_state','m_company_country','m_company_GSTIN'
    // ];
}
