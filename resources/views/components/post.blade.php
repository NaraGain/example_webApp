@props(['post' => $post])

<div class="bg-white p-3 my-2 border">
  
<a  href ="{{route('users.posts',$post->user)}}" 
class="font-weight-bold display-5 text-dark my-1"
 style="font-size:15px">{{ $post->user->username }}</a>
<span class="p-1 text-secondary">
  {{$post->created_at->diffForHumans()}}</span>
<div  style="font-size:15px;padding-left:2px;">
{{$post->body}}</div>
<hr>
<div class="d-inline-flex ">
@if(!$post->likeBy(auth()->user()))
<form action="{{route('posts.like',$post->id)}}" method="post" >
  @csrf
  <button type = "submit"class="btn">like</button>

</form>

@else

<form  action="{{route('posts.like',$post->id)}}" method="post">
  @csrf
  @method('DELETE')
  <button class="btn">unlike</button>
</form>
 @endif

 @if($post->OwnBy(auth()->user()))
 <form action ="{{route('posts.destory',$post->id)}}" method="post">
   @csrf
   @method('DELETE')
  <button class="btn">Delete</button>
</form>


@endif

@if($post->EditOwnBy(auth()->user()))
 <a class = "p-1 my-1 text-dark"
  href="{{route('posts.showdata',$post->id)}}">
  Edite</a>
@endif
<span  style="padding:7px;">
{{$post->likes->count()}} Like</span>
</div>
</div>


