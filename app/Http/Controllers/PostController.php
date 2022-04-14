<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Post;
use Prophecy\Doubler\LazyDouble;

class PostController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }
  
    
  
    public function index(){
     
   
     $posts = Post::get();
     // the paginate method is use to collect post ex<1-2-3-4-next> page
     //Pagination can be described as a sequence of pages example blow
     // $posts = Post::paginate('number_here');
    
        return view('post.index',['posts'=>
        $posts]);
    }

    public function store(Request $request){

      // dd($request->user()->posts());
    

        $this->validate($request,[
            'body'=>'required',
        ]);

    //  Post::create([
    //    'user_id'=>auth()->user()->id,
    //    'body'=>$request->body,
    //  ]);
        $request->user()->posts()->create([
          'body'=> $request-> body,
        ]);
       return back();
        }

        public function destory(Post $post){
          $post->delete();

       return back();
        }

        public function showdata($id){
         $data = Post::find($id);

         return view('layout.update',[
           'posts'=>$data
         ]);

}




// public function selectOnly($id){
// $post = Post::get()->where('user_id',$id);

// dd($post);

//   return back();
// }



    public function update(Request $request,$id, Post $posts){
           
        $request->validate([
           'body' => 'required'
          ]);

              $posts->where('id',$id)->update([
              'body'=> $request->body
                    ]);
              return back()->with('status','update is successfuly');
              
               }
}
