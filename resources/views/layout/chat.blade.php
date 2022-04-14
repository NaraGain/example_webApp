@extends('layout.app')
@section('content')

<div class="container p-3 my-3  text-dark">

<h4>{{$cname}}</h4>
@if($mess->count())
 <form  acton="{{route('chat.page',$user)}}" method="post">
    @csrf
    <div class="form-group"> 
      <textarea class="form-control "placeholder="send message" style ="border-radius:0px;"rows="1" id="comment" name="body">
    </textarea>
    </div>
@error('body')
<div>{{$message}}</div>
@enderror
<div>
<button type="submit" class="btn btn-primary btn-block " style="border-radius:2px;">send</button>
</div>
</form>
<div class="container mt-3 p-1 border">
  @foreach($mess as $messa)
  <div class="d-flex flex-row mb-1  text-dark @if($messa->OWnBy(auth()->user())) 
  d-flex flex-row-reverse @endif">
    <div class="p-2 @if($messa->OWnBy(auth()->user())) 
 bg-info text-white @else bg-white text-dark @endif">
      {{$messa->message}}
    </div>
  </div>
  @if($messa->OwnBy(auth()->user()))

  <div class="mb-3 d-flex flex-row-reverse">
    
    <form action="{{route('chat.delete',$messa->id)}}" method="post">
    @method('DELETE')
    @csrf
<button class="btn btn-light">Remove</button>
  </div>
</form>
  @endif
  @endforeach
</div>
</div>
@else

<h4 class="text-muted my-2">No message available</h4>
 @endif
 


</div>
@endsection