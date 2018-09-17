<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentReleased extends Model
{
    Protected $table = "tbl_payment_released";
    public $primaryKey = "payment_id";
    public $timestamps = true;

    public function broker_company_details()
    {
        return $this->belongsTo('App\Brokercompany', 'b_company_id', 'b_company_id');
    }
}
