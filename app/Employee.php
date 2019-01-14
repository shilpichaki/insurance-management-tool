<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    Protected $table = "tbl_employee_mast";
    public $primaryKey = "emp_id";
    public $timestamps = true;
    protected $fillable = [
        'emp_id', 'emp_first_name', 'emp_middle_name','emp_last_name','emp_dob','emp_email','emp_phno','emp_desg_id','emp_reports_to','emp_status','emp_identity','emp_introducer_name','emp_introducer_code','emp_age','emp_home_no','emp_fax_no','emp_education','emp_proff_qualification','emp_amfi_no','emp_irda_no','emp_other_qualification','emp_occupation','emp_exp_year','emp_pan_no','emp_aadhar_no'
    ];

    public function bank()
    {
        return $this->hasOne('App\BankMaster', 'user_id');
    }

    public function address()
    {
        return $this->hasOne('App\Address', 'user_id');
    }

    public function nominee()
    {
        return $this->hasOne('App\Nominee', 'user_id');
    }

    public function fileupload()
    {
        return $this->hasMany('App\FileUpload', 'user_id');
    }

    public function product()
    {
        return $this->hasone('App\Product', 'user_id');
    }

    public function userActivation()
    {
        return $this->hasone('App\UserActivation', 'user_id');
    }

    public function policies()
    {
        return $this->hasMany('App\Policy', 'user_id');
    }
    

    

}
