<!DOCTYPE html>
<html>
<head>
	<title>New Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
   <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> -->
   <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

   <style type="text/css">
        #map {
            width: 100%;
            height: 400px;
            margin: auto;
        }
    </style>
</head>
<body>
	<div class="container" style="margin: auto;">
	<h3 style="color: red;"><center>IF YOU ARE A CUSTOMER, REGISTER HERE</center></h3>
	
<form method="post" style="margin: auto;" action="http://127.0.0.1:8000/userregistration" name="user">
	@csrf
	
		<div class="form-group">
			<label>Your first name</label>
		    <input type="text" name="fname" id="f_n" class="form-control">
		    	<span style="color: red;" id="f_name"></span>
		    </div>
		    <div class="form-group">
			<label>Your last name</label>
		    <input type="text" name="lname" id="l_n" class="form-control">
		    <span style="color: red;" id="l_name"></span>
		    </div>
		    <div class="form-group">
			<label>Your email</label>
		    <input type="email" name="email" id="email" class="form-control">
		    <span style="color: red;" id="mail"></span>
		    </div>
		    <div class="form-group">
			<label>Your password</label>
		    <input type="password" name="password" id="password" class="form-control">
		    <span style="color: red;" id="pass"></span>
		    </div>
		    <div class="form-group">
			<label>About yourself</label>
		    <textarea rows="8" cols="20" name="about" id="description"></textarea>
		    <span style="color: red;" id="desc"></span>
		    </div>
		    <div>
			<label>Address</label>
			<div id="map"></div>
               <ul hidden id="geoData">
               <li>Latitude: <textarea id="lat-span" name="latitude"></textarea></li>
               <li>Longitude: <textarea id="lon-span" name="longitude"></textarea></li>
               </ul>
               <div name="address"></div>
            </div>
			<button type="submit" class="btn btn-success" name="submit">Submit</button>
</form>
</div>
<center><b>Alreagy Registered? Then <a href="http://127.0.0.1:8000/login">Login</a> here.</b></center>
<center><span id="success"></span></center>


<script type="text/javascript">
	
  $("form[name='user']").validate({
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      fname: "required",
      lname: "required",
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 5
      },
      about: "required",
      address: "required"
    },
    messages: {
      fname: "Please enter your firstname",
      lname: "Please enter your lastname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address",
      address: "Please provide your location from map"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });


	// function validation()
	// {
	// 	var first_name=document.getElementById("f_n").value;
	// 	var last_name=document.getElementById("l_n").value;
	// 	var email=document.getElementById("email").value;
	// 	var password=document.getElementById("password").value;
	// 	var about=document.getElementById("description").value;
	// 	if(first_name=="")
	// 	{
	// 		document.getElementById("f_name").innerHTML="this field cannot be empty";
	//     	document.getElementById("f_name").style.color="red";
	//     	return false;
	// 	}
	// 	if(last_name=="")
	// 	{
	// 		document.getElementById("l_name").innerHTML="this field cannot be empty";
	//     	document.getElementById("l_name").style.color="red";
	//     	return false;
	// 	}
	// 	if(email=="")
	// 	{
	// 		document.getElementById("mail").innerHTML="this field cannot be empty";
	//     	document.getElementById("mail").style.color="red";
	//     	return false;
	// 	}
	// 	if(password=="")
	// 	{
	// 		document.getElementById("pass").innerHTML="this field cannot be empty";
	//     	document.getElementById("pass").style.color="red";
	//     	return false;
	// 	}
	// 	if(password.length<5)
	// 	{
	// 		document.getElementById("pass").innerHTML="**enter minimum 5 digits";
	// 		document.getElementById("pass").style.color="red";
	// 		return false;
	// 	}
	// 	if((password.search(/[0-9]/) == -1))
	// 	{
	// 		document.getElementById("pass").innerHTML="**enter atleast one numeric value";
	// 		document.getElementById("pass").style.color="red";
	// 		return false;
	// 	}
	// 	if((password.search(/[a-z]/) == -1))
	// 	{
	// 		document.getElementById("pass").innerHTML="**enter atleast one lowercase value";
	// 		document.getElementById("pass").style.color="red";
	// 		return false;
	// 	}
	// 	if((password.search(/[A-Z]/) == -1))
	// 	{
	// 		document.getElementById("pass").innerHTML="**enter atleast one uppercase value";
	// 		document.getElementById("pass").style.color="red";
	// 		return false;
	// 	}
	// 	if((password.search(/[#]/) == -1) && (a.search(/[%]/) == -1) && (a.search(/[$]/) == -1))
	// 	{
	// 		document.getElementById("pass").innerHTML="**enter atleast one  special character";
	// 		document.getElementById("pass").style.color="red";
	// 		return false;
	// 	}
	// 	if(about=="")
	// 	{
	// 		document.getElementById("desc").innerHTML="this field cannot be empty";
	//     	document.getElementById("desc").style.color="red";
	//     	return false;
	// 	}
	// 	else
	// 	{
	// 		document.getElementById("success").innerHTML="successful";
	//     	document.getElementById("success").style.color="green";
	//     	return true;
	// 	}
	// }

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

CKEDITOR.replace('about');

</script>
<footer>
	@include('footer')
</footer>
</body>
</html>