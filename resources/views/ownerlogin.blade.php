<!DOCTYPE html>
<html>
<head>
	<title>Owner login page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container" style="margin: auto;">
  <h2>Please login with username and password</h2>
  <form method="post" action="/ownerlogin">
  	@csrf
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
</body>
</html>