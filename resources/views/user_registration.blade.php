<!DOCTYPE html>
<html>
<head>
	<title>New Registration</title>
</head>
<body>
	<h3><center>USER REGISTRATION PAGE</center></h3>
	<pre>
		

	</pre>
<form method="post" style="margin: auto;" action="http://127.0.0.1:8000/registration">
	@csrf
	<table style="margin: auto;" border="1" cellpadding="10" cellspacing="0">
		<tr>
			<td>Your first name</td>
		    <td><input type="text" name="fname"></td>
		</tr>
		<tr>
			<td>Your last name</td>
		    <td><input type="text" name="lname"></td>
		</tr>
		<tr>
			<td>Your email</td>
		    <td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td>Your password</td>
		    <td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>About yourself</td>
		    <td><textarea rows="8" cols="20" name="about"></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="register" value="Register"></center></td>
		</tr>
	</table>
</form>
<center><b>Alreagy Registered? Then <a href="http://127.0.0.1:8000/login">Login</a> here.</b></center>
</body>
</html>