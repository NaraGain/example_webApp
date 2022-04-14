@extends('layout.app')

@section('content')
<div class="container p-3 my-3  text-dark">
<div class="d-inline-flex ">
 <h4 class="my-2">{{$user->username}}</h4>
<a href="{{route('chat.page',$user->id)}}" class="p-2"> 
         <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
 class="bi bi-chat-fill " viewBox="0 0 16 16">
 <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
</svg>
</a>

</div>

<h5 class="p-1"> Post is {{$user->posts->count()}}</h5>
</div>
<div class="container p-3 my-3 text-dark">

                @if ($posts->count())
                    @foreach ($user->posts as $post)
                        <x-post :post="$post" />
                    @endforeach
                     @else
                    <p>{{ $user->name }} does not have any posts</p>
                @endif
            
</div>
@endsection