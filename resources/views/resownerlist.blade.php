<!DOCTYPE html>
<html>
<head>
	<title>Restaurant owner list</title>

	
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
	<center><h3><b>Restaurant Owner List</b></h3></center>
	<pre>
		

	</pre>
<table class="datatable table table-bordered table-striped" id="table_data">
	<thead>
		<th>ID</th>
	    <th>Image</th>
	    <th>Restaurant Name</th>
	    <th>Address</th>
	    <th>Street Address</th>
	    <th>Street No.</th>
	    <th>City</th>
	    <th>State</th>
	    <th>Zipcode</th>
	    <th>Country</th>
	    <th>Description</th>
	    <th>Cuisine</th>
	</thead>
	
</table>
<script type="text/javascript">

	$(document).ready( function(){
    $('#table_data').DataTable({
    	    processing: true,
            serverSide: true,
            ajax: "{{ route('get.ownertable') }}",
            "method":"GET",
            columns: [
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'res_name', name: 'res_name'},
            {data: 'address', name: 'address'},
            {data: 'st_add', name: 'st_add'},
            {data: 'route', name: 'route'},
            {data: 'city', name: 'city'},
            {data: 'state', name: 'state'},
            {data: 'zip', name: 'zip'},
            {data: 'country', name: 'country'},
            {data: 'about', name: 'about'},
            {data: 'cuisine', name: 'cuisine'},
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