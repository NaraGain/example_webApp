<html>


<head>
<title>
  Chat app
</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<div class="container p-3 my-3 border bg-white text-dark">
  <h5>Post From</h5>
 <form action="{{route('chat.store')}}" method="post">
    @csrf
    <div class="form-group">
     
      <textarea class="form-control " style ="border-radius:0px;"rows="5" id="comment" name="message_box"></textarea>
    </div>
    @error('body')
    <div class="text-danger">{{$message}}</div>
@enderror
<div>

<button type="submit" class="btn btn-primary " style="border-radius:0px;">Start</button>
<button type="submit" class="btn btn-primary " style="border-radius:0px;">Post</button>

</div>
  </form>
</div>
</body>

</html>