@extends('layout.app')

@section('content')

<div class="container ">
    chat list
</div>
<div class="container p-4 my-3 ">
  
@if($room->count())

@foreach($room as $rooms)
<div class="container-lg p-3 my-1 bg-white border">
<h4>
    <a href="{{route('chat.page',$rooms)}}">

    {{$rooms->title}}
    </a>

</h4>

</div>

@endforeach

@else
<h4 class="text-muted">No Chat Available Now</h4>
@endif

</div>
@endsection