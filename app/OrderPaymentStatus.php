<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPaymentStatus extends Model
{
    Protected $table = "order_payment_status";
    public $primaryKey = "order_payment_status_id";
    public $timestamps = true;
}
