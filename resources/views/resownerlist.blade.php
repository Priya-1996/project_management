<!DOCTYPE html>
<html lang="en">
<head>
  <title>Restaurant Owner List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script
  src="http://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
</head>
<body>

<div class="container" style="margin: auto;">
  <center><h2 style="color: red;">Restaurant Owner List</h2></center>            
  <table class="table">
    <thead>
        <th>ID</th>
        <th>Image</th>
        <th>Restaurant Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Street Address</th>
        <th>Street No.</th>
        <th>City</th>
        <th>State</th>
        <th>Zipcode</th>
        <th>Country</th>
        <th>Description</th>
        <th>Cuisine</th>
        <th>Action</th>
    </thead>
    <tbody>
      @foreach($data as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td><img src="{{ asset('/images/'.$row->image) }}" height="100" width="100"></td>
        <td>{{ $row->res_name }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->address }}</td>
        <td>{{ $row->st_add }}</td>
        <td>{{ $row->route }}</td>
        <td>{{ $row->city }}</td>
        <td>{{ $row->state }}</td>
        <td>{{ $row->zip }}</td>
        <td>{{ $row->country }}</td>
        <td>{{!! $row->about !!}}</td>
        <td>{{ $row->cuisine }}</td>
        <td><a href="{{ route('data.active',[$row->email]) }}" style="color: white;"><button type="button" id="active" class="btn btn-success">ACTIVATE</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script> 
        $(document).ready(function() { 
            $("button").click(function() { 
                $("#active").html("INACTIVE");
            }); 
        }); 
    </script>

</body>
</html>