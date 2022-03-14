@extends('layout.app')

@section('content')
<div class="container-sm  p-3 my-3   bg-white">
<div class="container  p-1    bg-white ">
<form action="{{ route('register') }}" method='post'>
@csrf
  <div class="form-group">
  <input type="text" class="form-control p-4"  style="border-radius:0px;"  placeholder="Your Name" name ="name" id="name">
 @error('name')
 <div class="bg-danger my-3 p-2 text-white p-1">{{$message}}</div>
 @enderror
  </div>
  <div class="form-group">
 
    <input type="text" class="form-control p-4"  style="border-radius:0px;"placeholder="Username" name="username" id="username">
  </div>
  @error('username')
 <div class="bg-danger my-3 p-2 text-white p-1">{{$message}}</div>
 @enderror
  <div class="form-group">
    
    <input type="email" class="form-control p-4" style="border-radius:0px;" placeholder="Email" name="email" id="email">
  </div>
  @error('email')
 <div class="bg-danger my-3 p-2 text-white p-1">{{$message}}</div>
 @enderror
  <div class="form-group">
   
    <input type="password" class="form-control p-4" style="border-radius:0px;" placeholder="Password"  name="password"id="password">
  </div>
  @error('password')
 <div class="bg-danger my-3 p-2 text-white p-1">{{$message}}</div>
 @enderror
  <div class="form-group">
   <input type="password" class="form-control p-4"  style="border-radius:0px;"placeholder="Comfirm Password"  name="confirmPass" id="confirmPass">
  </div>
  @error('password')
 <div class="bg-danger my-3 p-2 text-white p-1">{{$message}}</div>
 @enderror
 <div>
  <button type="submit" class="btn btn-primary btn-lg btn-block" style="border-radius:0px;" >Register</button>
</div>
</form>
</div>
</div>
@endsection