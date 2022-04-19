<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;


class UserpostController extends Controller
{
  public function index(User $user){


 $posts = $user->posts()->with(['user', 'likes']);
$room = Room::select('id')->where('title',$user->username)->get();

foreach($room as $r){
  $text = $r;
}

if(!$room->count()){
 return redirect()->route('chat.page',[
   'user' => $user,
   'room' => $room
 ]);
}
return  view('layout.user',[
    'user'=>$user,
    'posts' => $posts,
    'room' => $text
    
]);


  }

  public function userProfile(){
 $user = Auth::user();
 $post = Post::get()->where('user_id',$user->id);
       return view('layout.userProfile',[
             'user' => $user,
          'post' => $post
                     ]);
  }
}
