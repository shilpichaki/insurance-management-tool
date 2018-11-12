<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolicyRecoveryData extends Model
{
    Protected $table = "tbl_policy_recovery_data";
    public $primaryKey = "recovery_id";
    public $timestamps = true;

    public function order_details()
    {
        return $this->belongsTo('App\PolicyOrder', 'order_id', 'order_id');
    }
}
