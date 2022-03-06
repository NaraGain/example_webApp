<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\room;
use Illuminate\Http\Request;

class chatController extends Controller
{
 public function start(){

   return view('layout.start');
 }

public function index(message $message){

     return view('layout.chat');
  }
 
public function startChat(Request $request){
    $request->rooms()->create();
    return back();
}


 public function store(Request $request){

$this->validate($request,[
    'message_box' => 'required', 
]);

$request->user()->message()->create([
    'message_box'=> $request->message_box
]);

     return back();
 }
}
