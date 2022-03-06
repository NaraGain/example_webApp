<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    public function index(){
        //use to return login page when user send request 
        return view('auth.login');
    }
    
    public function store(Request $request){
        //validate method use to validate user login in
       $this->validate($request,[
           'email'=>'required|email',
           'password'=>'required'
       ]);
       //this session is use to validate user email and password if user password and email is not match 
       //for $request->remember is use to remember user when user click check box remember me
       if(!auth()->attempt($request->only('email','password'),$request->remember)){
           return back()->with('status','Invail login');
       }
       //redirect is use to return dashboard page
       return redirect()->route('dashboard');
    }
}
