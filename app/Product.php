<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    public $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'user_id','product_name'
    ];

    //sub broker details
    public function sub_broker()
    {
        return $this->belongsTo('App\SubBroker');
    }
}
