<!DOCTYPE html>
<html>
<head>
	<title>New Registration</title>
	<style type="text/css">
        #map {
            width: 50%;
            height: 300px;
            margin: auto;
        }
    </style>
</head>
<body>
	<h3><center>USER REGISTRATION PAGE</center></h3>
	<pre>
		

	</pre>
<form method="post" style="margin: auto;" action="http://127.0.0.1:8000/registration" onsubmit="return validation()">
	@csrf
	<table style="margin: auto;" border="1" cellpadding="10" cellspacing="0">
		<tr>
			<td>Your first name</td>
		    <td><input type="text" name="fname" id="f_n">
		    	<span style="color: red;" id="f_name"></span>
		    </td>
		</tr>
		<tr>
			<td>Your last name</td>
		    <td><input type="text" name="lname" id="l_n">
		    <span style="color: red;" id="l_name"></span>
		</td>
		</tr>
		<tr>
			<td>Your email</td>
		    <td><input type="email" name="email" id="email">
		    <span style="color: red;" id="mail"></span>
		</td>
		</tr>
		<tr>
			<td>Your password</td>
		    <td><input type="password" name="password" id="password">
		    <span style="color: red;" id="pass"></span>
		</td>
		</tr>
		<tr>
			<td>About yourself</td>
		    <td><textarea rows="8" cols="20" name="about" id="description"></textarea>
		    <span style="color: red;" id="desc"></span>
		</td>
		</tr>
		<tr>
			<center><td colspan="2">
			<div id="map"></div>
               <ul id="geoData">
               <li>Latitude: <span id="lat-span"></span></li>
               <li>Longitude: <span id="lon-span"></span></li>
               </ul>
            </td></center>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="register" value="Register"></center></td>
		</tr>
	</table>
</form>
<center><b>Alreagy Registered? Then <a href="http://127.0.0.1:8000/login">Login</a> here.</b></center>
<center><span id="success"></span></center>


<script type="text/javascript">
	function validation()
	{
		var first_name=document.getElementById("f_n").value;
		var last_name=document.getElementById("l_n").value;
		var email=document.getElementById("email").value;
		var password=document.getElementById("password").value;
		var about=document.getElementById("description").value;
		if(first_name=="")
		{
			document.getElementById("f_name").innerHTML="this field cannot be empty";
	    	document.getElementById("f_name").style.color="red";
	    	return false;
		}
		if(last_name=="")
		{
			document.getElementById("l_name").innerHTML="this field cannot be empty";
	    	document.getElementById("l_name").style.color="red";
	    	return false;
		}
		if(email=="")
		{
			document.getElementById("mail").innerHTML="this field cannot be empty";
	    	document.getElementById("mail").style.color="red";
	    	return false;
		}
		if(password=="")
		{
			document.getElementById("pass").innerHTML="this field cannot be empty";
	    	document.getElementById("pass").style.color="red";
	    	return false;
		}
		if(password.length<5)
		{
			document.getElementById("pass").innerHTML="**enter minimum 5 digits";
			document.getElementById("pass").style.color="red";
			return false;
		}
		if((password.search(/[0-9]/) == -1))
		{
			document.getElementById("pass").innerHTML="**enter atleast one numeric value";
			document.getElementById("pass").style.color="red";
			return false;
		}
		if((password.search(/[a-z]/) == -1))
		{
			document.getElementById("pass").innerHTML="**enter atleast one lowercase value";
			document.getElementById("pass").style.color="red";
			return false;
		}
		if((password.search(/[A-Z]/) == -1))
		{
			document.getElementById("pass").innerHTML="**enter atleast one uppercase value";
			document.getElementById("pass").style.color="red";
			return false;
		}
		if((password.search(/[#]/) == -1) && (a.search(/[%]/) == -1) && (a.search(/[$]/) == -1))
		{
			document.getElementById("pass").innerHTML="**enter atleast one  special character";
			document.getElementById("pass").style.color="red";
			return false;
		}
		if(about=="")
		{
			document.getElementById("desc").innerHTML="this field cannot be empty";
	    	document.getElementById("desc").style.color="red";
	    	return false;
		}
		else
		{
			document.getElementById("success").innerHTML="successful";
	    	document.getElementById("success").style.color="green";
	    	return true;
		}
	}

	function initMap() {
    var myLatLng = {lat: 22.3038945, lng: 70.80215989999999};
  
    var map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 13
    });
  
    var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!',
          draggable: true
        });
  
     google.maps.event.addListener(marker, 'dragend', function(marker) {
        var latLng = marker.latLng;
        document.getElementById('lat-span').innerHTML = latLng.lat();
        document.getElementById('lon-span').innerHTML = latLng.lng();
     });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
</body>
</html>