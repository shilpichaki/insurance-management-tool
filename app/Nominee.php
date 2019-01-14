<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    protected $table = "nominee_details";
    public $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'user_id','nominee_name', 'nominee_relationship',
    ];

    //sub broker details
    public function sub_broker()
    {
        return $this->belongsTo('App\SubBroker');
    }
}
