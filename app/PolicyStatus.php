<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolicyStatus extends Model
{
    Protected $table = "tbl_policy_status";
    public $primaryKey = "policy_status_id";
    public $timestamps = true;
}
