<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    protected $table = "user_activation";

    public $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
         'user_id', 'user_activation_id'
    ];

    //sub broker details
    public function sub_broker()
    {
        return $this->belongsTo('App\SubBroker');
    }
}
