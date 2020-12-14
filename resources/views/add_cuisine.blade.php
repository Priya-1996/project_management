<!DOCTYPE html>
<html>
<head>
	<title>Add cuisine</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>

	<div class="sidenav">
        <a href="http://127.0.0.1:8000/dashboard">Dashboard</a>
        <a href="http://127.0.0.1:8000/admindisplay">Userlist</a>
        <a href="">Action</a>
        <a href="">Add Cuisine</a>
        <a href="http://127.0.0.1:8000/modify">Modify Cuisine</a>
        <a href="http://127.0.0.1:8000/logout">Logout</a>
    </div>

	<center><h2 style="color: green;">ADD CUISINE HERE</h2></center>
	<form action="http://127.0.0.1:8000/addcuisine" method="post">
		<div>
    <center><h3 style="background-color: green; color: white;">{{ Session::get('msg') }}</h3></center>
</div>
		@csrf
    <div class="form-group" style="margin-left: 250px; margin-top: 100px;">
      <label for="cuisine">Cuisine Name:</label>
      <input type="text" class="form-control" id="cuisine" placeholder="Enter cuisine name" name="cuisine">
      <br>
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
    
  </form>


</body>
</html>