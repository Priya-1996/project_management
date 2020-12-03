<!DOCTYPE html>
<html>
<head>
	<title>Admin Login page</title>
</head>

<body>
    	<pre>
    		
    	</pre>
	<h3><center>ADMIN PANEL<br>Login here with correcr email id and password</center></h3>
	<pre>
		
	</pre>
    <form method="get" action="http://127.0.0.1:8000/admin">
	@csrf
	<table border="1" cellpadding="10" cellspacing="0" style="margin: auto;">
		<tr>
			<td>Your email</td>
			<td><input type="email" name="email">
		</td>
		</tr>
		<tr>
			<td>Your password</td>
			<td><input type="password" name="password">
		</td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="login" value="Login"></center></td>
		</tr>
	</table>
</form>
</body>
</html>