@extends('layout.app')

@section('content')

<div class="container ">
  <h5>Post From</h5>
  <div class=" container bg-white ">
 <form action="{{route('posts')}}" method="post" style="margin-top: 40px;">
    @csrf
    <div class="form-group">
     
      <textarea class="form-control " style ="border-radius:0px;"rows="1" id="comment" name="body" placeholder="What happen today"></textarea>
    </div>
    @error('body')
    <div class="text-danger">{{$message}}</div>
@enderror
<div>
<button type="submit" class="btn btn-primary " style="border-radius:0px; ">Post</button>

</div>
  </form>

  </div>
  <div class="container">
  @if($posts->count())
@foreach($posts as $post)
<x-post :post="$post" />

@endforeach
<!-- <div class ="container"> 
 <div>$posts->links()</div>
</div> -->
  @else

<p>No post there</p>
  @endif
</div>

@endsection