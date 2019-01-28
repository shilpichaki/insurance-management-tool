<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use App\UserActivation;

class SubbrokerDataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subBroker = User::findOrFail(Auth::user()->id);
        $name = $subBroker->employee->emp_first_name;
        $policy = $subBroker->policies;
       
        if($policy == null)
        {
            return view('subbroker.index')->with('subBroker' , $subBroker);
        }
        else
        {
            $sub_brokers = Employee::where('emp_introducer_code', '=', 
             $subBroker
             ->userActivation
             ->user_activation_id)
             ->with('policies')
             ->get();

             return view('subbroker.index', compact('policy','name','sub_brokers'));

        }

        //return view('home');
    }   
}
