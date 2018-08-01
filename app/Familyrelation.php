<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familyrelation extends Model
{
    Protected $table = "tbl_family_relation_mast";
    public $primaryKey = "relation_code";
    public $timestamps = true;
}
