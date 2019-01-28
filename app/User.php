<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empid', 'email', 'userid', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'empid', 'emp_id');
    }

    public function role()
	{
		return $this->hasOne('App\Role', 'id', 'role_id');
	}

	public function hasRole($roles)
	{
		$this->have_role = $this->getUserRole();
		// Check if the user is a root account
		if($this->have_role->name == 'Admin') {
			return true;
		}
		if(is_array($roles)){
			foreach($roles as $need_role){
				if($this->checkIfUserHasRole($need_role)) {
					return true;
				}
			}
		} else{
			return $this->checkIfUserHasRole($roles);
		}
		return false;
	}

	private function getUserRole()
	{
		return $this->role()->getResults();
	}
	
	private function checkIfUserHasRole($need_role)
	{
		return (strtolower($need_role) == strtolower($this->have_role->name)) ? true : false;
	}

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
        return $this->hasone('App\UserActivation', 'employee_id', 'empid');
    }

    public function policies()
    {
        return $this->hasMany('App\Policy', 'user_id', 'empid');
    }
}
