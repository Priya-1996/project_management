<!DOCTYPE html>
<html>
<head>
	<title>Image table</title>
</head>
<body>
	<center><h3><b>Images you have uploaded</b></h3></center>
	<pre>
		

	</pre>
<table border="1" style="margin: auto;">
	<thead>
		<th>SL No.</th>
	    <th>Image</th>
	    <th>Action</th>
	</thead>
	
    <tbody>
	<?php
	$sl=1;
	?>
	@foreach($data as $row)
	<tr>
		<td>{{ $sl }}</td>
		<td><img src="{{ asset('/images/'.$row->image_name) }}" height="100" width="100"></td>
		<td><a href="{{ route('image.delete',[$row->id]) }}" style="color: white;"><button style="background-color: red;">Delete</button></a></td>
	</tr>
	<?php
	$sl++;
	?>
    @endforeach
</tbody>
</table>
</body>
</html>