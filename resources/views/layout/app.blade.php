<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
</head>
<body  class="bg-light">

<nav class="navbar navbar-expand-sm  p-3" style="background :#383838;">
<div class ="container">
  <ul class="navbar-nav" >
    <li class="nav-item ">
      <a style="color:white" class="nav-link" href="{{route('home')}}">Home</a>
    </li>
    <li class="nav-item active">
      <a  style="color:white"class="nav-link" href="{{ route('dashboard')}}">Dashboard</a>
    </li>
    <li class="nav-item active">
    <a style="color:white" class="nav-link" href="{{ route('posts') }}">Post</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link text-white" href="{{route('list')}}">chat</a>
    </li>
</ul>
<form>
<input type="text" class="form-control" placeholder="Search" id="search">
</form>
    <ul class="navbar-nav d-flex">
    @if(auth()->check())
    
    <li class="nav-item active">
    
<a  class="nav-link" style="color:white;" href="{{route('userProfile')}}">{{auth()->user()->username}}</a>
  

</li>
      <li class="nav-item active">
        <form style="margin-left:5px" action="{{route('logout')}}" method="post">
          @csrf
         
        <button type="submit"class="btn text-white">logout</button> 
</form>
    </li>
  
    @else
    <li class="nav-item active">
      <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
    </li>
    <li class="nav-item active text-white">
      <a class="nav-link text-white" href="{{ route('register')}}">Register</a>
    </li>
    @endif
  </ul>
</div>

</nav>
 @yield('content')
</body>
</html>