<!DOCTYPE html>
<html>
<head>
	<title>Restaurant owner registration</title>
	
	<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script
  src="http://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
  

</head>
<body>
<div class="container" style="margin: auto;">
  <h2>Fill the details below to register</h2>
  <form method="get" action="http://127.0.0.1:8000/resowner_reg" style="margin: auto;" enctype="multipart/form-data" onsubmit="return validation()">
  	@csrf
    <div class="form-group">
      <label for="image">Restaurant Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter image" name="image" required><span id="i"></span>
    </div>
    <div>
    <label for="name">Restaurant Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required><span id="n"></span>
    </div>
    <div class="form-group">
	<div class="panel">
		<div class="panel-heading">
			<label class="panel-title">Address</label> 
		</div>
		<div class="panel-body">
			<input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" class="form-control" name="add" required>
			<br>
			<div id="address">
				<div class="row">
					<div class="col-md-6">
						<label class="control-label">Street address</label>
						<input class="form-control" id="street_number" name="st_add" disabled="true">
					</div>
					<div class="col-md-6">
						<label class="control-label">Route</label>
						<input class="form-control" id="route" name="route" disabled="true">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label class="control-label">City</label>
						<input class="form-control field" id="locality" name="city" disabled="true">
					</div>
					<div class="col-md-6"> 
						<label class="control-label">State</label>
						<input class="form-control" id="administrative_area_level_1" name="state" disabled="true">
					</div>
				</div>
				<div class="row">
					 <div class="col-md-6">
						<label class="control-label">Zip code</label>
						<input class="form-control" id="postal_code" name="zip" disabled="true">
					 </div>
					 <div class="col-md-6">
						<label class="control-label">Country</label>
						<input class="form-control" id="country" name="country" disabled="true">
					 </div>
				</div>
		   </div>
		</div>
	</div>
</div>
    <div class="form-group">
      <label for="about">Add Description:</label>
      <textarea id="myeditor" name="editor1" required></textarea><span id="ed"></span>
    </div>
    <!-- <div class="form-group">
      <label for="cuisine">Cuisine:</label><br>
      <label><input type="checkbox" id="food" name="cuisine[]" value="indian">Indian</label>
      <label><input type="checkbox" id="food" name="cuisine[]" value="chinese">Chinese</label>
      <label><input type="checkbox" id="food" name="cuisine[]" value="italian">Italian</label><span id="c"></span>
    </div> -->
    <button type="submit" class="btn btn-success" name="submit">Submit</button>
  </form>
</div>
<script type="text/javascript">

	var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
	// $(document).ready(function(){
 //      $('#myeditor').summernote();
 //    });
function validation()
{
	var image=document.getElementById("image").value;
	var name=document.getElementById("name").value;
	var address=document.getElementById("searchInput").value;
	var latitude=document.getElementById("lat").value;
	var longitude=document.getElementById("lon").value;
	var about=document.getElementById("myeditor").value;
	var cuisine=document.getElementById("food").value;
	    if(image=="")
		{
			document.getElementById("i").innerHTML="Please insert image";
	    	document.getElementById("i").style.color="red";
	    	return false;
		}
		if(name=="")
		{
			document.getElementById("n").innerHTML="Please enter restaurent name";
	    	document.getElementById("n").style.color="red";
	    	return false;
		}
		if(address=="")
		{
			document.getElementById("a").innerHTML="Please add your adreess";
	    	document.getElementById("a").style.color="red";
	    	return false;
		}
		if(about=="")
		{
			document.getElementById("ed").innerHTML="Please add description";
	    	document.getElementById("ed").style.color="red";
	    	return false;
		}
		// if(cuisine=="")
		// {
		// 	document.getElementById("c").innerHTML="Please add at laest one cuisine";
	 //    	document.getElementById("c").style.color="red";
	 //    	return false;
		// }

}      



    
    CKEDITOR.replace('editor1');
    
	

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO5aIIFAK1Z-5aL2e2Xw2DJY1lHqiW4Ec&libraries=places&callback=initAutocomplete" async defer></script>

</body>
</html>