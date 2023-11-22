<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use App\Models\Employee;
use Helper\ResponseHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    private $responseHelper;
    function __construct(ResponseHelper $responseHelper){
        $this->responseHelper = $responseHelper;
    }
    public function index(){
        //$this->responseHelper->generateRandomNumber();
        return view('index');
    }
    public function loginpage(){
        return view('login');
    }
    public function dashboard(){
        if (Auth::check()) {
            // Get the authenticated user's name
            $username = Auth::user()->name;
    
            // Pass the username to the view
            return view('dashboard', compact('username'));
        } else {
            // User is not authenticated, you can handle this case as needed
            return view('dashboard');
        }
    }
        

    public function verify($url){
     
        $data = unserialize(base64_decode($url));
        Employee::where('id', $data['id'])->where('email', $data['email'])->update(['email_verified' => '1']);
        return redirect('/loginpage');
        
    }

 
    public function register(Request $request){
       $validation = Validator::make($request->all(),config('rules.employee_validation'),config('rulesmessage.employee_validation'));

       if($validation->fails()){
        return redirect()->back()->withErrors($validation->errors());
       }else{
           $createEmployee = new Employee();
           $createEmployee->name = $request->name;
           $createEmployee->email = $request->email;
           $createEmployee->password = Hash::make($request->password);
           $createEmployee->save();
           $data1 = ['id' => $createEmployee->id,'email' => $request->email];
           $data = base64_encode(serialize($data1));
           Mail::to($request->email)->send(new sendMail($data));
           return redirect()->back()->with('success', 'employee created successfully');
       }
    }
    public function login(Request $request){
       $validation = Validator::make($request->all(),config('rules.login_validation'),config('rulesmessage.login_validation'));
       if($validation->fails()){
        return redirect()->back()->withErrors($validation->errors());
       }else{
        $check = Employee::where('email',$request->email)->first();
        if(isset($check) && !empty($check)){
            if (Hash::check($request->password, $check->password)) {
                if($check->email_verified == '1'){
                    return redirect()->route('dashboard')->with('success', 'employee login successfully');
                }else{
                   return redirect()->back()->with('error', 'Your email verification is pending, please verify your email address');
                }
               
            }else{
                return redirect()->back()->with('error', 'Invalid password');
            }
             
        }else{
           return redirect()->back()->with('error', 'employee does not exist');
        }
       
       }
    }
}
