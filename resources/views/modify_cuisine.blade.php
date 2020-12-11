<!DOCTYPE html>
<html>
<head>
	<title>Modify cuisines</title>
	<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script
  src="http://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>


<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<div class="sidenav">
        <a href="http://127.0.0.1:8000/dashboard">Dashboard</a>
        <a href="http://127.0.0.1:8000/admindisplay">Userlist</a>
        <a href="">Action</a>
        <a href="http://127.0.0.1:8000/cuisine">Add Cuisine</a>
        <a href="">Modify Cuisine</a>
        <a href="http://127.0.0.1:8000/logout">Logout</a>
    </div>
    <div class="main">
    	<center><h3 style="color: green;">MODIFY CUISINE HERE</h3></center>
    </div>
    <div>
    <center><h3 style="background-color: green; color: white;">{{ Session::get('msg') }}</h3></center>
</div>
    <button style="margin-top: 100px; margin-left: 200px;" class="btn btn-success"><a href="http://127.0.0.1:8000/cuisine" style="color: white;"> ADD NEW CUISINE</a></button>
    <table border="1" cellpadding="20" cellspacing="10" style="margin: auto;">
        <thead>
          <th>ID</th>
          <th>CUISINE</th>
          <th>ACTION</th>
        </thead>
        @foreach($table as $tab)
        <tbody>
          <td>{{$tab->id}}</td>
          <td>{{$tab->cuisine}}</td>
          <td><a href="{{ route('cuisine.delete',[$tab->id]) }}" style="color: white;"><button class="btn btn-danger"> Delete</button></a></td>
        </tbody>
        @endforeach
    </table>
  
</body>
</html>