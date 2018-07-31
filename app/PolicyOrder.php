<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolicyOrder extends Model
{
    Protected $table = "tbl_policy_order";
    public $primaryKey = "order_id";
    public $timestamps = true;
}
