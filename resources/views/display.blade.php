<!DOCTYPE html>
<html>
<head>
	<title>display page</title>
</head>
<body>
<h3><center>WELCOME TO DISPLAY PAGE</center></h3>
<pre>
	


</pre>
<form method="post" action="/imageupload" enctype="multipart/form-data">
	<center>
	@csrf
	<b>Upload images:</b><br>
	<br>
	<input type="file" name="image[]" multiple><br>
	<br>
	<input type="submit" name="upload" value="Upload">
	</center>
</form>
<pre>
	

</pre>
<center><button><a href="http://127.0.0.1:8000/first"> LOGOUT</a></button></center>
</body>
</html>