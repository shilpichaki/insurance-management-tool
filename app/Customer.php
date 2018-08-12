<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    Protected $table = "tbl_customer_mast";
    public $primaryKey = "customer_id";
    public $timestamps = true;
}
