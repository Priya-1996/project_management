<!DOCTYPE html>
<html>
<head>
	<title>user data table</title>

	
  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>   



	
</head>
<body>
	<center><h3><b>All User Data</b></h3></center>
	<pre>
		

	</pre>
<table class="datatable table table-bordered table-striped" id="table_data">
	<thead>
		<th>ID</th>
	    <th>First Name</th>
	    <th>Last Name</th>
	    <th>Email</th>
	    <th>Password</th>
	    <th>Description</th>
	    <th>Action</th>
	</thead>
	
    <!-- <tbody>
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
</tbody> -->
</table>
<script type="text/javascript">

	$(document).ready( function(){
    $('#table_data').DataTable({
    	    processing: true,
            serverSide: true,
            ajax: "{{ route('get.tabledata') }}",
            "method":"GET",
            columns: [
            {data: 'id', name: 'id'},
            {data: 'fname', name: 'fname'},
            {data: 'lname', name: 'lname'},
            {data: 'email', name: 'email'},
            {data: 'password', name: 'password'},
            {data: 'about', name: 'about'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]          
    });
    });
</script>
</body>
</html>