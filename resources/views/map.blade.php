<!DOCTYPE html>
<html>
<head>
<title> Auto-Complete Address Form</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<style>
	.container {
	  margin-top: 20px;
	}
	</style>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript" ></script>
	
</head>
<body>
<form method="get">
  @csrf
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Address</h3>
		</div>
		<div class="panel-body">
			<input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" class="form-control">
			<br>
			<div id="address">
				<div class="row">
					<div class="col-md-6">
						<label class="control-label">Street address</label>
						<input class="form-control" id="street_number" disabled="true">
					</div>
					<div class="col-md-6">
						<label class="control-label">Route</label>
						<input class="form-control" id="route" disabled="true">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label class="control-label">City</label>
						<input class="form-control field" id="locality" disabled="true">
					</div>
					<div class="col-md-6"> 
						<label class="control-label">State</label>
						<input class="form-control" id="administrative_area_level_1" disabled="true">
					</div>
				</div>
				<div class="row">
					 <div class="col-md-6">
						<label class="control-label">Zip code</label>
						<input class="form-control" id="postal_code" disabled="true">
					 </div>
					 <div class="col-md-6">
						<label class="control-label">Country</label>
						<input class="form-control" id="country" disabled="true">
					 </div>
				</div>
		   </div>
		</div>
	</div>
</div>
</form>  

<!-- Note Add Your API Key Below -->
<!-- The Form Will Not Work Without a Registered API Key -->
<!-- https://developers.google.com/maps/documentation/javascript/get-api-key -->
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


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO5aIIFAK1Z-5aL2e2Xw2DJY1lHqiW4Ec&libraries=places&callback=initAutocomplete" async defer></script>

</body>
</html>