<!DOCTYPE html>
<html>
<head>
	<title>Image table</title>
</head>
<body>
<table>
	<th>SL No.</th>
	<th>Image</th>

	<?php
	$sl=1;
	@foreach($data as $row)
	{
	?>
	<tr>
		<td><?php echo $sl; ?></td>
		<td><img src="{{ asset('/images/'). $row['image_name']}}" height="50" width="50"></td>
	</tr>
	<?php
	$sl++;
    }
    @endforeach
	?>
</table>
</body>
</html>