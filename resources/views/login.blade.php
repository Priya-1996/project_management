<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
</head>
<body>
	<h3><center>Login here with correcr email id and password</center></h3>
<form method="post" action="http://127.0.0.1:8000/login">
	@csrf
	<table border="1" cellpadding="10" cellspacing="0" style="margin: auto;">
		<tr>
			<td>Your email</td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td>Your password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="login" value="Login"></center></td>
		</tr>
	</table>
</form>
</body>
</html>