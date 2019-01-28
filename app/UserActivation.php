<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    protected $table = "user_activation";

    public $timestamps = true;
    protected $fillable = [
         'employee_id', 'user_activation_id'
    ];

    //sub broker details

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id', 'emp_id');
    }

    public function employeesWithIntroducerCode() {
        return $this->hasMany('App\Employee', 'emp_introducer_code', 'user_activation_id');
    }
}
