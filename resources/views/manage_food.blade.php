<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Owner dashboard</title>
    <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="sidenav">
        <a href="http://127.0.0.1:8000/ownerdashboard">Dashboard</a>
        <a href="http://127.0.0.1:8000/">profile</a>
        <a href="http://127.0.0.1:8000/food">Manage food</a>
    </div>
    <center><h2 style="color: red;">ADD AS PER YOUR CHOICE</h2></center>
    <center><h2 style="color: green;">{{ Session::get('msg2') }}</h2></center>
    	<div class="container" style="margin-top: 200px;margin-left: 200px;">
  
  <form method="post" action="/addfood" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="foodname">Add food name:</label>
      <input type="text" class="form-control" id="foodname" placeholder="Enter food name" name="foodname">
    </div>
    <div class="form-group">
      <label for="price">Add food price:</label>
      <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
    </div>
    <div class="form-group">
      <label for="image">Add food image:</label>
      <input type="file" class="form-control" id="image" name="image[]">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
</body>
</html>