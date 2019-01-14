<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
// use App\Http\Controllers\Auth;
use App\User;
use App\Policy;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    public function index() //Shilpi changed index method for showing data after login of subbroker on 10.01.2019
    {
        return view('/home');
        // if(Auth::user()->role->name == "SubBroker")
        // {
        //     $subBroker = User::findOrFail(Auth::user()->id);

        //     $name = $subBroker->employee->emp_first_name;
        //     // dd($name);
        //     $policy = $subBroker->policies;
        //     // dd($policy);
        //     // dd($subBroker);
        //     if($subBroker->policies == null)
        //     {
                
        //         return view('home')->with('subBroker' , $subBroker);

        //     }
        //     else
        //     {
        //         $sub_brokers = User::with(['userActivation' , 'policies'])->where('introducer_code' , $subBroker->userActivation->user_id)->first();
        //         dd($sub_brokers);
        //         if($sub_brokers)
        //         {
        //             return view('home')->with(['policy' => $policy , 'sub_broker' => $sub_brokers , 'name' => $name]);
        //         }
        //         else
        //         {
        //             return view('home')->with('subBroker' , $subBroker->policy);
        //         }
                
        //     }
        // }
        // else
        // {
        //     return view('home');
        // }

        
        
    
        
    }
}
