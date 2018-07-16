<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class PassportController extends Controllers
{
    public $successStatus = 200;

    public function login()
    {
        if(Auth::attempt(['email' => request('email'),'password' => request('password')]))
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
        $validator = Validator::make($request->all(), 
            [
                'emp_id' => 'required', 
                'emp_first_name' => 'required', 
                'emp_middle_name' => 'string|max:100',
                'emp_last_name' => 'string|max:100',
                'emp_dob' => 'required',
                'emp_email' => 'required|string|email|max:255|unique:users',
                'emp_phno' => 'required',
                'emp_desg_id' => 'required',
                'emp_reports_to' => 'required',
                'emp_status' => 'required',
                'password' => 'required|string|min:6|confirmed'
            ],
            ['emp_email.required' => 'Email is required','password.required' => 'Password is required']
        );

        if ($validator->fails()) {
            $failedRules = $validator->failed();
            $messages = $validator->errors()->getMessages();
            foreach($messages as $message)
            {
                echo $message[0];
            }
        }
    }
}

?>