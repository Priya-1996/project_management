<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>

</head>
<body>
	<h3><center>Login here with correcr email id and password</center></h3>
<form method="post" action="http://127.0.0.1:8000/login" onsubmit="return f()">
	@csrf
	<table border="1" cellpadding="10" cellspacing="0" style="margin: auto;">
		<tr>
			<td>Your email</td>
			<td><input type="email" name="email" id="mail">
			<span id="m"></span>
		</td>
		</tr>
		<tr>
			<td>Your password</td>
			<td><input type="password" name="password" id="pass">
			<span id="p"></span>
		</td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="login" value="Login"></center></td>
		</tr>
	</table>
</form>
<center><span id="success"></span></center>
<script type="text/javascript">
	function f()
	{
		var email=document.getElementById("mail").value;
		var password=document.getElementById("pass").value;
		if(email=="")
		{
			document.getElementById("m").innerHTML="this field cannot be empty";
	    	document.getElementById("m").style.color="red";
	    	return false;
		}
		if(password=="")
		{
			document.getElementById("p").innerHTML="this field cannot be empty";
	    	document.getElementById("p").style.color="red";
	    	return false;
		}
		if(password.length<5)
		{
			document.getElementById("p").innerHTML="**enter minimum 5 digits";
			document.getElementById("p").style.color="red";
			return false;
		}
		if((password.search(/[0-9]/) == -1))
		{
			document.getElementById("p").innerHTML="**enter atleast one numeric value";
			document.getElementById("p").style.color="red";
			return false;
		}
		if((password.search(/[a-z]/) == -1))
		{
			document.getElementById("p").innerHTML="**enter atleast one lowercase value";
			document.getElementById("p").style.color="red";
			return false;
		}
		if((password.search(/[A-Z]/) == -1))
		{
			document.getElementById("p").innerHTML="**enter atleast one uppercase value";
			document.getElementById("p").style.color="red";
			return false;
		}
		if((password.search(/[#]/) == -1) && (a.search(/[%]/) == -1) && (a.search(/[$]/) == -1))
		{
			document.getElementById("p").innerHTML="**enter atleast one  special character";
			document.getElementById("p").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("success").innerHTML="successful";
	    	document.getElementById("success").style.color="green";
	    	return true;
		}
	}
</script>
</body>
</html>