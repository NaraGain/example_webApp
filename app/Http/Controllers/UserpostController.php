<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class UserpostController extends Controller
{
  public function index(User $user){
 $posts = $user->posts()->with(['user', 'likes']);





return  view('layout.user',[
    'user'=>$user,
    'posts' => $posts,
    
  
   
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
