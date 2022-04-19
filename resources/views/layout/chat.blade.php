@extends('layout.app')
@section('content')

<div class="container text-dark">

<div class=" container bg-white p-3">
<h4>{{$username}}</h4>
</div>
<div id ="box" class="container p-1 border overflow-auto" style="height:550px;">
  @foreach($mess as $messa)
  <div style="font-size:20px;" class="d-flex flex-row mb-1  text-dark @if($messa->OWnBy(auth()->user())) 
  d-flex flex-row-reverse @endif">
    <div class="p-2 @if($messa->OWnBy(auth()->user())) 
 bg-info text-white @else bg-white text-dark @endif">
      {{$messa->message}}
      <div style="font-size: 10px;">{{$messa->created_at->diffForHumans()}}</div>
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
@if($mess->count())
<div class="containerd" style="height: fit-content;">
 <form  acton="{{route('chat.page',[$user,$room])}}" method="post" >
    @csrf
      <div class="d-flex flex-row">
      <textarea class="form-control" placeholder="send message" style ="border-radius:0px;"rows="2 " name="body"></textarea>
@error('body')
<div>{{$message}}</div>
@enderror
<input class="btn btn-info "  type ="submit" name="send" value="send" style="border-radius:2px; width:100px"/>
</form>
</div>
@endif

@if(!$mess->count())
<h4 class="text-muted my-2">No message available</h4>
<form action="{{route('chat.new',[$user])}}" method="post">
  @csrf
<input class="btn btn-info btn-block" type="submit"  name="greeting" value="SayHi👏"/>
</form>
 @endif 

</div>
@endsection

<!-- <script>

  $(document).ready(function(){
    $('#box').scroll(function)
  })
</script> -->