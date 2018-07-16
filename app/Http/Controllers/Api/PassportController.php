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
            ['name' => 'required','email' => 'required'],
            ['title.required' => 'Title is required','body.required' => 'Body is required']
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