<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    Protected $table = "tbl_designation_mast";
    public $primaryKey = "designation_id";
    public $timestamps = true;
}
