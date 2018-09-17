<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRecived extends Model
{
    Protected $table = "tbl_payment_recived";
    public $primaryKey = "payment_id";
    public $timestamps = true;

    public function mother_company_details()
    {
        return $this->belongsTo('App\Mothercompany', 'm_company_id', 'm_company_id');
    }
    public function sub_company_details()
    {
        return $this->belongsTo('App\Subcompany', 's_company_id', 's_company_id');
    }
}
