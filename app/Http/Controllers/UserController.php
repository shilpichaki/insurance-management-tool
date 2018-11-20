<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use App\Util;
use Illuminate\Http\Request;
use Auth;
use DB;

class UserController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'emp_first_name' => 'required', 
            'emp_middle_name' => 'string|max:100|nullable',
            'emp_last_name' => 'string|max:100|nullable',
            'emp_dob' => 'required|date',
            'emp_email' => 'required|string|email|max:255',
            'emp_phno' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $employee = new Employee;

        DB::beginTransaction();

        try
        {
            $employee->emp_id = Auth::user()->empid;
            $employee->emp_first_name = $request->input('emp_first_name');
            $employee->emp_middle_name = $request->input('emp_middle_name');
            $employee->emp_last_name = $request->input('emp_last_name');
            $employee->emp_dob = Util::mysqlDateTimeConverter($request->input('emp_dob'));
            $employee->emp_email = $request->input('emp_email');
            $employee->emp_phno = $request->input('emp_phno');
            $employee->save();

            $user->userid = Auth::user()->userid;
            $user->empid = Auth::user()->empid;
            $user->email = $request->input('emp_email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            DB::commit();
            return redirect('/home');
        }
        catch(\Exception $e)
        {
            var_dump($e);
            DB::rollback();
        }
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $empid = Auth::user()->empid;
        $currentUser = User::where('empid', $empid)->first();
        $rolelist = DB::select("select id,name from roles");
        $designationlist = DB::select("select designation_id,designation_name from tbl_designation_mast");
        return view('profile.update',compact('currentUser','rolelist','designationlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
