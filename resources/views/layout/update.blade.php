@extends('layout.app')

@section('content')
<div class="container p-3 my-3 border bg-white text-dark">
 <form action="{{route('posts.update',$posts->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">

      <textarea class="form-control" rows="5" id="comment" name="body" style="border-radius: 0px;" >{{$posts->body}} </textarea>
    </div>
    @error('body')
    <div class="text-danger">{{$message}}</div>
@enderror
@if(session('status'))
<div class = "text-success">{{session('status')}}</div>
@endif
<div>
<button style="border-radius: 0px;" type="submit" class="btn btn-primary btn-block ">Post</button>
</div>
  </form>
</div>
  @endsection