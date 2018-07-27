<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mothersubcompanyrelations extends Model
{
    Protected $table = "tbl_mother_sub_company_relation";
    public $timestamps = true;

    public function motherCompany()
    {
        return $this->belongsTo('App\Mothercompany', 'm_company_id', 'm_company_id');
    }
    public function subCompany()
    {
        return $this->belongsTo('App\Subcompany', 's_company_id', 's_company_id');
    }
}
