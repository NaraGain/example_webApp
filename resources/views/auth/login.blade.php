@extends('layout.app')

@section('content')
<div class="container-sm  p-3 my-3   bg-white">
<div class="container  p-1    bg-white ">
 
<form action="{{ route('login') }}" method='post'>
@csrf
  <div class="form-group">
  <input type="email" class="form-control p-4"  style="border-radius:0px;"placeholder="Your Email" name ="email" id="name">
 @error('email')
 <div class="text-danger p-1">{{$message}}</div>
 @enderror
  </div>
  <div class="form-group">
 
    <input type="password" class="form-control p-4" style="border-radius:0px;" placeholder="Your Password" name="password" id="username">
  </div>
  @error('password')
 <div class="text-danger p-1">{{$message}}</div>
 @enderror
  </div>
  @if(session('status'))
    <div class="alert alert-warning">{{session('status')}}</div>
    @endif
    <div class="custom-control custom-checkbox my-2">
      <input type="checkbox" class="custom-control-input"  style="border-radius:0px;"id="customCheck" name="remember">
      <label class="custom-control-label" for="customCheck">remember me</label>
    </div>
  <div class="form-group">
     <button type="submit" class="btn btn-primary btn-lg btn-block"  style="border-radius:0px;">login</button>
</div>

</form>

</div>

</div>

@endsection