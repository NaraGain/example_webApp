<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
   public function store(Request $request){
    //validate user
    $this->validate($request, [
        'name' => 'required',
        'username'=>'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);
    User::create([
'name'=>$request->name,
'username'=>$request->username,
'email'=>$request->email,
'password'=>$request->password,
]);
//sign in user
auth()->attempt([
    'email'=>$request->email,
    'password'=>$request->password,
]);


return redirect()->route('dashboard');
   }
}
