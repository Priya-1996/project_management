<!DOCTYPE html>
<html>
<head>
	<title>Edit User Data</title>
</head>
<body>
	<h3><center>EDIT USER DATA</center></h3>
	<pre>
		

	</pre>
<form method="post" style="margin: auto;" action="http://127.0.0.1:8000/dataupdate" onsubmit="return val()">
	@csrf
	<table style="margin: auto;" border="1" cellpadding="10" cellspacing="0">
		<tr>
			<td>Your first name</td>
		    <td><input type="text" name="fname" value="{{ $data['fname'] }}">
		    	<input type="hidden" name="userid" value="{{ $data['id'] }}">
		    	<span style="color: red;">{{ $errors->first('fname') }}</span>
		    </td>
		</tr>
		<tr>
			<td>Your last name</td>
		    <td><input type="text" name="lname" value="{{ $data['lname'] }}">
		    <span style="color: red;">{{ $errors->first('lname') }}</span>
		</td>
		</tr>
		<tr>
			<td>Your email</td>
		    <td><input type="email" name="email" value="{{ $data['email'] }}">
		    <span style="color: red;">{{ $errors->first('email') }}</span>
		</td>
		</tr>
		<tr>
			<td>Your password</td>
		    <td><input type="password" name="password" value="{{ $data['password'] }}">
		    <span style="color: red;">{{ $errors->first('password') }}</span>
		</td>
		</tr>
		<tr>
			<td>About yourself</td>
		    <td><textarea rows="8" cols="20" name="about" >{{ $data['about'] }}</textarea>
		    <span style="color: red;">{{ $errors->first('about') }}</span>
		</td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="update" value="Update"></center></td>
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