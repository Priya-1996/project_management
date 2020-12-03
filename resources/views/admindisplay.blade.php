<!DOCTYPE html>
<html>
<head>
	<title>Image table</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
        <a href="">Dashboard</a>
        <a href="">Admin</a>
        <a href="">Action</a>
        <a href="http://127.0.0.1:8000/adminlogin">Logout</a>
    </div>
    <div class="main">
	<center><h3><b>All User Data</b></h3></center>
	<pre>
		

	</pre>
<table border="1" style="margin: auto; background-color: lightyellow;" cellspacing="0">
	<thead>
		<th>SL No.</th>
	    <th>First Name</th>
	    <th>Last Name</th>
	    <th>Email</th>
	    <th>Password</th>
	    <th>Description</th>
	    <th>Action</th>
	</thead>
	
    <tbody>
	<?php
	$sl=1;
	?>
	@foreach($data as $row)
	<tr>
		<td>{{ $sl }}</td>
		<td>{{ $row->fname }}</td>
		<td>{{ $row->fname }}</td>
		<td>{{ $row->email }}</td>
		<td>{{ $row->password }}</td>
		<td>{{ $row->about }}</td>
		<td>
			<a href="" style="color: white;"><button style="background-color: green;">Edit</button></a>
			<a href="{{ route('data.delete',[$row->id]) }}" style="color: white;"><button style="background-color: red;">Delete</button></a>

		</td>
	</tr>
	<?php
	$sl++;
	?>
    @endforeach
</tbody>
</table>
</div>
</body>
</html>