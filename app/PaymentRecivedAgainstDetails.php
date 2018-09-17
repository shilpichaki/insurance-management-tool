<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRecivedAgainstDetails extends Model
{
    Protected $table = "tbl_payment_recived_against_details";
    public $timestamps = true;

    public function payment_details()
    {
        return $this->belongsTo('App\PaymentRecived', 'payment_id', 'payment_id');
    }
    public function order_details()
    {
        return $this->belongsTo('App\PolicyOrder', 'order_id', 'order_id');
    }
    public function policy_details()
    {
        return $this->belongsTo('App\Policy', 'policy_id', 'policy_id');
    }
}
