<!DOCTYPE html>
<html>
<head>
	<title>user data table</title>

	<script
  src="http://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>



	
</head>
<body>
	<center><h3><b>All User Data</b></h3></center>
	<pre>
		

	</pre>
<table border="1" style="margin: auto; background-color: lightyellow;" cellspacing="0" id="table_id" class="display">
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
	foreach($data as $row){
	?>
	
	<tr>
		<td>{{ $sl }}</td>
		<td>{{ $row->fname }}</td>
		<td>{{ $row->lname }}</td>
		<td>{{ $row->email }}</td>
		<td>{{ $row->password }}</td>
		<td>{{ $row->about }}</td>
		<td>
			<a href="{{ route('data.edit',[$row->id]) }}" style="color: white;"><button style="background-color: green;">Edit</button></a>
			<a href="{{ route('data.delete',[$row->id]) }}" style="color: white;"><button style="background-color: red;">Delete</button></a>

		</td>
	</tr>
	<?php
	$sl++;
    }
	?>
</tbody>
</table>
<script type="text/javascript">

	$(document).ready( function(){
    $('#table_id').DataTable({
    });
    });
</script>
</body>
</html>