<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'emp_id' => 'required', 
            'emp_first_name' => 'required', 
            'emp_middle_name' => 'string|max:100|nullable',
            'emp_last_name' => 'string|max:100|nullable',
            'emp_dob' => 'required',
            'emp_email' => 'required|string|email|max:255',
            'emp_phno' => 'required',
            'emp_desg_id' => 'required',
            'emp_reports_to' => 'required',
            'emp_status' => 'required',
            'userid' => 'required|unique:users',
            'password' => 'required|string|min:6'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $input)
    {
        $employee_input = [
            'emp_id' => $input["emp_id"], 
            'emp_first_name' => $input["emp_first_name"], 
            'emp_middle_name' => $input["emp_middle_name"],
            'emp_last_name' => $input["emp_last_name"],
            'emp_dob' => Util::mysqlDateTimeConverter($input["emp_dob"]),
            'emp_email' => $input["emp_email"],
            'emp_phno' => $input["emp_phno"],
            'emp_desg_id' => $input["emp_desg_id"],
            'emp_reports_to' => $input["emp_reports_to"],
            'emp_status' => 1
        ];
        $employee = Employee::create($employee_input);

        $user_input = [
            "empid" => $input["emp_id"],
            "userid" => $input["userid"],
            "email" => $input["emp_email"],
            "password" => bcrypt($input['password'])
        ];

        $user = User::create($user_input);
        return $user;
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);
    }
}
