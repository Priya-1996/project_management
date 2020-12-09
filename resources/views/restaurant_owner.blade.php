<!DOCTYPE html>
<html>
<head>
	<title>Restaurant owner registration</title>
	<style type="text/css">
        .mapControls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
        #searchMapInput {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 50%;
        }
        #searchMapInput:focus {
            border-color: #4d90fe;
        }
    </style>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/tsnrzbtu0xvh08him77jpmrtc2h0k0v9zge7vpp5tf1gg5lg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script
  src="http://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
</head>
<body>
<div class="container" style="margin: auto;">
  <h2>Fill the details below to register</h2>
  <form action="" style="margin: auto;">
    <div class="form-group">
      <label for="image">Restaurant Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter email" name="image">
    </div>
    <div>
    <label for="address">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div>
    <input id="searchMapInput" class="mapControls" type="text" placeholder="Enter a location">
    <ul id="geoData">
       <li>Full Address: <span id="location-snap"></span></li>
       <li>Latitude: <span id="lat-span"></span></li>
       <li>Longitude: <span id="lon-span"></span></li>
    </ul>
    </div>
    <div class="form-group">
      <label for="about">Add Description:</label>
      <textarea id="myeditor"></textarea>
    </div>
    <div class="form-group">
      <label for="cuisine">Cuisine:</label><br>
      <label><input type="checkbox" name="indian">Indian</label>
      <label><input type="checkbox" name="chinese">Chinese</label>
      <label><input type="checkbox" name="italian">Italian</label>
    </div>
    <button type="submit" class="btn btn-success" name="submit">Submit</button>
  </form>
</div>
<script type="text/javascript">
	function initMap() {
    var input = document.getElementById('searchMapInput');
  
    var autocomplete = new google.maps.places.Autocomplete(input);
   
    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        document.getElementById('location-snap').innerHTML = place.formatted_address;
        document.getElementById('lat-span').innerHTML = place.geometry.location.lat();
        document.getElementById('lon-span').innerHTML = place.geometry.location.lng();
    });
}
    tinymce.init({
      selector: '#myeditor',
      // plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      // toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      // toolbar_mode: 'floating',
      // tinycomments_mode: 'embedded',
      // tinycomments_author: 'Author name',
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
</body>
</html>