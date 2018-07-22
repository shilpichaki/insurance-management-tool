<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Employee;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

use App\Util;

class PassportController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if(Auth::attempt(['userid' => request('userid'),'password' => request('password')]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else
        {
            return response()->json(['error' => 'Unauthorised'], 401);

        }
    }

    public function register(Request $request)
    {
        $user = new User;
        $employee = new Employee;

        $validator = Validator::make($request->all(), 
            [
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
            ],
            ['emp_email.required' => 'Email is required','password.required' => 'Password is required']
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->getMessages()], 401);
        }

        $input = $request->all();

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
            'emp_status' => $input["emp_status"]
        ];
        $employee = Employee::create($employee_input);

        $user_input = [
            "empid" => $input["emp_id"],
            "email" => $input["userid"],
            "userid" => $input["emp_email"],
            "password" => bcrypt($input['password'])
        ];

        //return $user_input;
        $user = User::create($user_input);

        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success' => $success], $this->successStatus);
    }

    public function getEmployeeDetails()
    {
        $allEmployee = Employee::all();
        $allEmployee = DB::select('Select * from tbl_employee_mast');
        if(empty($allEmployee))
        {
            $result = array("status"=>0);
        }
        else
        {
            $result = array("status"=>1,"data"=>$allEmployee);
        }
        return $result;
    }
}

?>