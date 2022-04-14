@extends('layout.app')



@section('content')

<div class="container p-3 my-3  text-dark">
        <div class="container ">
<div class="d-inline-flex ">
 <h4 class="my-2" @readonly>{{$user->username}}</h4>
 
</div>
<h5 class="p-1"> Post is {{$user->posts->count()}}</h5>
        </div>

<div class="container p-3 my-3 text-dark">

          @foreach($post as $post)
<x-post :post='$post'/>

          @endforeach
          
</div>
</div>
@endsection