<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;
use Validator;
use App\Util;
use App\User;
use App\FileUpload;
use App\Product;
use App\Address;
use App\BankMaster;
use App\Nominee;
use App\UserActivation;
use App\Mail\VerifyMail;

class SubBrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = DB::select("select state_id,state_name from states");
        $designationlist = DB::select("select designation_id,designation_name from tbl_designation_mast");
        return view('subbroker.create',compact('states', 'designationlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subBroker = $request->isMethod('put') ? Employee::findOrFail($request->emp_id) : new Employee;

        if($request->isMethod('put'))
        {
            $validator = Validator::make($request->all(), 
                [
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
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
        }
        else
        {
            $validator = Validator::make($request->all(), 
                [
                    'emp_id' => 'required', 
                    'emp_first_name' => 'required', 
                    'emp_middle_name' => 'string|max:100|nullable',
                    'emp_last_name' => 'string|max:100|nullable',
                    'emp_dob' => 'required|date',
                    'emp_email' => 'required|string|email|max:255',
                    'emp_phno' => 'required',
                    'emp_desg_id' => 'required',
                    'emp_reports_to' => 'required',
                    'userid' => 'nullable',
                    'password' => 'required|string|min:6|confirmed',
                    'role' => 'nullable|exists:roles,id',           //End of Dwipraj's Code
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
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->getMessages()], 401);
            }
        }

        DB::beginTransaction();
            $employee_input = [
                'emp_id' => $request["emp_id"], 
                'emp_first_name' => $request["emp_first_name"], 
                'emp_middle_name' => $request["emp_middle_name"],
                'emp_last_name' => $request["emp_last_name"],
                'emp_dob' => Util::mysqlDateTimeConverter($request["emp_dob"]),
                'emp_email' => $request["emp_email"],
                'emp_phno' => $request["emp_phno"],
                'emp_desg_id' => $request["emp_desg_id"],
                'emp_reports_to' => $request["emp_reports_to"],
                'emp_status' => '1',                         //End of Dwipraj's Code
                'emp_identity' => $request['associatetype'] ,  //changed by Shilpi to modify the registration process on 11.01.2019
                'emp_introducer_name' => $request['introducername'],
                'emp_introducer_code' => $request['introducercode'],
                'emp_age' => $request['age'],
                'emp_home_no' => $request['homephno'],
                'emp_fax_no' => $request['faxno'],
                'emp_education' => $request['qualification'],
                'emp_proff_qualification' => $request['proffqualification'],
                'emp_amfi_no' => $request['amfino'] ,
                'emp_irda_no' => $request['irdano'] ,
                'emp_other_qualification' => $request['otherqualification'],
                'emp_occupation' => $request['occupation']  ,
                'emp_exp_year' => $request['experience'],
                'emp_pan_no' => $request['panno'],
                'emp_aadhar_no' => $request['aadharno'],
            ];
        
            $employee = Employee::create($employee_input);
            
            $user_input = [
                "empid" => $request["emp_id"],
                //"userid" => $request["userid"],
                "email" => $request["emp_email"],
                "password" => bcrypt($request['password']),
                "role_id" => '5'
            ];

            $user_array = User::create($user_input);
            

            //bank-details
            $bank_input = [
                'user_id' => $request["emp_id"],
                'bank_name' => $request['bankname'],
                'branch_name' => $request['bankbranchname'],
                'account_no' => $request['accountno'],
                'branch_code' => $request['branchcode'],
                'ifsc' => $request['ifsc'],
                'micr' => $request['micr'],
                'branch_rtgs_no' => $request['rtgs'],
                'acc_type' => $request['accounttype'] ,
                'is_active' => '1',
            ];
            $bank = BankMaster::create($bank_input);

            

            //nominee-details
            Nominee::create([
                'user_id' => $request["emp_id"],
                'nominee_name' => $request['nomineename'],
                'nominee_relationship' => $request['nomineerelation'],
            ]);

            //address-details
            Address::create([
                'user_id' => $request["emp_id"],
                'permanent_street' => $request['permstreet'],
                'permanent_town' => $request['permtown'],
                'permanent_pin' => $request['permpin'],
                'permanent_state_id' => $request['permstate'],
                'present_street' => $request['presentstreet'],
                'present_town' => strtoupper($request['presenttown']),
                'present_pin' => $request['presentpin'],
                'present_state_id' => $request['presentstate'],
            ]);

            //Generate User-ID and save
            $string_name = strtoupper($request['emp_first_name']);
            $string_town = strtoupper($request['presenttown']);
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
            

            $userid = UserActivation::create([
                'employee_id' => $request["emp_id"],
                'user_activation_id' => $username,
                
            ]);
          
            \Mail::to($employee->emp_email)->send(new VerifyMail($employee)); //sending mail to the new sub-broker


            //product-details
            Product::create([
                'user_id' => $request["emp_id"],
                'product_name' => $request['product'],
            ]);

            //file-upload
            $title = $request['amfi_file'];
            $imageName = $title->getClientOriginalName();
            $title->move(public_path('upload'), $imageName);
            

            $phototitle = $request['photo'];
            $nameOfPhoto = $phototitle->getClientOriginalName();
            $phototitle->move(public_path('upload'), $nameOfPhoto);
            

            $signtitle = $request['sign'];
            $nameOfSign = $signtitle->getClientOriginalName();
            $signtitle->move(public_path('upload'), $nameOfSign);
            

            $file = FileUpload::create([
                'user_id' => $request["emp_id"],
                'amfi_file' => $title,
                'photo' => $nameOfPhoto,
                'sign' => $nameOfSign,
            ]);
            

            DB::commit();
            return redirect('/')->with('success', ['You have successfully registered as SubBroker. Please check your email.']);

    }

}
