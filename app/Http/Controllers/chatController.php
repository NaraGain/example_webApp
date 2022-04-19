<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSending;
use Mockery\Generator\Method;
use PHPUnit\Framework\RiskyTestError;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class chatController extends Controller
{


  public function index($user,$room)
  {
    $clientName = user::find($user)->only(['username']);
    foreach ($clientName as $cl) {
      $text = $cl;
    }

  
    $auth = Auth::id();
  
   // dd($auth);
    
    //check room before get result not ready...
    //check auth message 
 

    $message = Message::select('message','created_at')
    ->where('rid' , $room)
    ->where('uid' ,'=', '2')
    ->get();

   
     foreach($message as $m){
       $t = $m->rid;

     }

  
    
    return view('layout.chat', [
      'user' => $user,
      'mess' => $message,
      'room' => $room,
      'username' =>$text,

    ]);
  }

  public function message(Request $request, $id,$room)
  {
   

    $this->validate($request, [
      'body' => 'required',
    ]);

  
    if ($request->has($request['send'])) {
      Message::create([
        'uid' => auth()->user()->id,
        'u2id' => $id,
        'rid' => $room,
        'message' => $request->body
      ]);

      return back();
    }
  }

  public function createRoom(Request $request, $id)
  {
    $clientName = user::find($id)->only(['username']);

    foreach ($clientName as $cl) {
      $text = $cl;
    }

    Room::create([
      'title' => $text,
      'reciverid' => $id
    ]);

$room = Room::select('id','reciverid')->where('reciverid',$id)->get();

foreach ($room as $r) {
  $id= $r;
}

  $sayhi = "Hi !👏 " . '' . $text;
  Message::create([
    'uid' => auth()->user()->id,
    'u2id' => $id->reciverid,
    'rid' => $id->id,
    'message' => $sayhi
  ]);

  return back();

 

  
    
  }

  public function destory(Message $message)
  {
    $message->delete();
    return back();
  }
}
