<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Employee;
use App\Util;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use App\FileUpload;
use App\Product;
use App\Address;
use App\BankMaster;
use App\Nominee;
use App\UserActivation;
use App\Mail\VerifyMail;
use Dotenv\Exception\ValidationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            'emp_dob' => 'required|date',
            'emp_email' => 'required|string|email|max:255',
            'emp_phno' => 'required',
            'emp_desg_id' => 'required',
            'emp_reports_to' => 'required',
            'userid' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|exists:roles,id',           //End of Dwipraj's Code
            'identity' => 'in:individual,company|nullable', //changed by Shilpi to modify the registration process on 11.01.2019
            'introducername' => 'string|nullable',
            'introducercode' => 'string|nullable',
            'age' =>'integer|nullable',
            'homephno' => 'nullable',
            'faxno' => 'nullable',
            'qualification' => 'string|nullable',
            'proffqualification' => 'nullable|string',
            'amfino' => 'in:yes,no|nullable',
            'filename' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'irdano' => 'in:yes,no|nullable',
            'otherqualification' => 'nullable|string',
            'occupation' => 'in:service,business,housewife,retired,other|nullable',
            'experience' => 'integer|nullable',
            'product' => 'in:fixeddeposit,mutualfund,rbibonds,lifeinsurance,generalinsurance,educationalproduct,poscheme|nullable',
            'pan_no' => 'string|unique:tbl_employee_master|nullable',
            'aadharno' => 'nullable',
            'bankname' => 'nullable|string',
            'bankbranchname' => 'nullable|string',
            'accountno' => 'nullable|string',
            'branchcode' => 'nullable|string',
            'ifsc' => 'nullable|string',
            'micr' => 'nullable|string',
            'rtgs' => 'nullable|string',
            'accounttype' => 'nullable|in:savings,current,nre,nro',
            'nomineename' => 'nullable|string',
            'nomineerelation' => 'nullable|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'sign' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
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
        

        // if(Auth::user()->role->name == "Admin")
        // {
        //     DB::beginTransaction();
        //     $user = new User;
        //     $employee = new Employee;
        //     $employee_input = [
        //         'emp_id' => $input["emp_id"], 
        //         'emp_first_name' => $input["emp_first_name"], 
        //         'emp_middle_name' => $input["emp_middle_name"],
        //         'emp_last_name' => $input["emp_last_name"],
        //         'emp_dob' => Util::mysqlDateTimeConverter($input["emp_dob"]),
        //         'emp_email' => $input["emp_email"],
        //         'emp_phno' => $input["emp_phno"],
        //         'emp_desg_id' => $input["emp_desg_id"],
        //         'emp_reports_to' => $input["emp_reports_to"],
        //         'emp_status' => '1'
        //     ];
        //     Employee::create($employee_input);
        //     $user_input = [
        //         "empid" => $input["emp_id"],
        //         "userid" => $input["userid"],
        //         "email" => $input["emp_email"],
        //         "password" => bcrypt($input['password']),
        //         "role_id" => $input["role"]
        //     ];
        //     $createdUser = User::create($user_input);
        //     DB::commit();
        //     // return $createdUser;
        // }
        // elseif(Auth::user()->role->name == "Modarator" || Auth::user()->role->name == "Viewer" || Auth::user()->role->name == "SpecialAdmin" || Auth::user()->role->name == "SubBroker")
        // {
        //     return redirect('/home')->with('status' , 'You are not authorized to do this!!');
        // }
        // else
        // {
            DB::beginTransaction();
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
                'emp_status' => '1',                         //End of Dwipraj's Code
                'emp_identity' => $input['associatetype'] ,  //changed by Shilpi to modify the registration process on 11.01.2019
                'emp_introducer_name' => $input['introducername'],
                'emp_introducer_code' => $input['introducercode'],
                'emp_age' => $input['age'],
                'emp_home_no' => $input['homephno'],
                'emp_fax_no' => $input['faxno'],
                'emp_education' => $input['qualification'],
                'emp_proff_qualification' => $input['proffqualification'],
                'emp_amfi_no' => $input['amfino'] ,
                'emp_irda_no' => $input['irdano'] ,
                'emp_other_qualification' => $input['otherqualification'],
                'emp_occupation' => $input['occupation']  ,
                'emp_exp_year' => $input['experience'],
                'emp_pan_no' => $input['panno'],
                'emp_aadhar_no' => $input['aadharno'],
            ];
        //  print_r($employee_input);
            $employee = Employee::create($employee_input);
            // print_r($employee);
            $user_input = [
                "empid" => $input["emp_id"],
                //"userid" => $input["userid"],
                "email" => $input["emp_email"],
                "password" => bcrypt($input['password']),
                "role_id" => '5'
            ];

            $user_array = User::create($user_input);
            // dd($user_array);

            //bank-details
            $bank_input = [
                'user_id' => $input["emp_id"],
                'bank_name' => $input['bankname'],
                'branch_name' => $input['bankbranchname'],
                'account_no' => $input['accountno'],
                'branch_code' => $input['branchcode'],
                'ifsc' => $input['ifsc'],
                'micr' => $input['micr'],
                'branch_rtgs_no' => $input['rtgs'],
                'acc_type' => $input['accounttype'] ,
                'is_active' => '1',
            ];
            $bank = BankMaster::create($bank_input);

            // dd($bank);

            //nominee-details
            Nominee::create([
                'user_id' => $input["emp_id"],
                'nominee_name' => $input['nomineename'],
                'nominee_relationship' => $input['nomineerelation'],
            ]);

            //address-details
            Address::create([
                'user_id' => $input["emp_id"],
                'permanent_street' => $input['permstreet'],
                'permanent_town' => $input['permtown'],
                'permanent_pin' => $input['permpin'],
                'permanent_state_id' => $input['permstate'],
                'present_street' => $input['presentstreet'],
                'present_town' => strtoupper($input['presenttown']),
                'present_pin' => $input['presentpin'],
                'present_state_id' => $input['presentstate'],
            ]);

            //Generate User-ID and save
            $string_name = strtoupper($input['emp_first_name']);
            // dd($string_name);
            $string_town = strtoupper($input['presenttown']);
            $rand_no = mt_rand(100000, 999999);
            $string_const = "RCDK/" ;

            $RCDK = array_filter(explode(" ", $string_const));

            $username = array_filter(explode(" ", $string_name));
            $username = array_slice($username, 0, 3); //return only first three part

            $town = array_filter(explode(" ", $string_town));
            $town = array_slice($town, 0, 3);//return only first three part

            $part1 = (!empty($RCDK[0]))?substr($RCDK[0],0 ,5):"";
            $part2 = (!empty($username[0]))?substr($username[0], 0,3):"";
            $part3 = (!empty($town[0]))?substr($town[0], 0,3):"";
            //$part2 = (!empty($username[1]))?substr($username[1], 0,5):"";
            $part4 = ($rand_no)?rand(0, $rand_no):"";

            $username = $part1.$part2."/".$part3."/".$part4;
            dd($username);

            UserActivation::firstOrNew([
                'user_id' => $input["emp_id"],
                'user_activation_id' => $username,
                
            ]);
            dd($employee->userActivation);
            \Mail::to($employee->emp_email)->send(new VerifyMail($employee)); //sending mail to the new sub-broker


            //product-details
            Product::create([
                'user_id' => $input["emp_id"],
                'product_name' => $input['product'],
            ]);

            //file-upload
            $title = $input['amfi_file'];
            $imageName = $title->getClientOriginalName();
            $title->move(public_path('upload'), $imageName);
            // dd($title);

            $phototitle = $input['photo'];
            $nameOfPhoto = $phototitle->getClientOriginalName();
            $phototitle->move(public_path('upload'), $nameOfPhoto);
            // dd($phototitle);

            $signtitle = $input['sign'];
            $nameOfSign = $signtitle->getClientOriginalName();
            $signtitle->move(public_path('upload'), $nameOfSign);
            // dd($signtitle);

            $file = FileUpload::create([
                'user_id' => $input["emp_id"],
                'amfi_file' => $title,
                'photo' => $nameOfPhoto,
                'sign' => $nameOfSign,
            ]);
            // dd($file);

            DB::commit();
        // }
        // // return $user_array ;
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        event(new Registered($employee = $this->create($request->all())));
        return $this->registered($request, $employee)
            ?: redirect($this->redirectPath());
    }

    public function showRegistrationForm()
    {
        // if(Auth::user()->role->name == "Admin")
        // {
        //     $rolelist = DB::select("select id,name from roles");
        //     $designationlist = DB::select("select designation_id,designation_name from tbl_designation_mast");
        //     return view("auth.register", compact('rolelist', 'designationlist'));
        // }
        // else
        // {
            $states = DB::select("select state_id,state_name from states");
            $designationlist = DB::select("select designation_id,designation_name from tbl_designation_mast");
            return view("auth.register", compact('states', 'designationlist'));
        // }
    }
}
