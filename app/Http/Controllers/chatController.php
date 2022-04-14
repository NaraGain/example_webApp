<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSending;

class chatController extends Controller
{

public function index($user){

  $message = Message::where('rid',1)->get();
$clientName = user::find($user)->only(['username']);
foreach($clientName as $cl){
  $text = $cl;
}
     return view('layout.chat',[
       'user' =>$user,
       'mess' =>$message,
       'cname' =>$text
     ]);
  }
 
public function message(Request $request,$id){


$this->validate($request,[
    'body' => 'required',
]);

//dd($id);
Message::create([
  'uid' => auth()->user()->id,
  'u2id' => $id,
  'rid' => 1,
  'message'=> $request->body
]);

return back();
}

public function destory(Message $message){
  $message->delete();
  return back();
}



}
