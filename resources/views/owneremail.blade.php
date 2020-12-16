<!DOCTYPE html>
<html>
<head>
	<title>abc</title>
</head>
<body>
<h1>{{ $data['title'] }}</h1>
<p>{{ $data['body'] }}</p>
<p>Welcome {{ $data['email'] }}</p>
<p><a href="{{ route('verify',$data['ran_name']) }}">
	{{ $data['ran_name'] }}</a>
	<a href="{{ route('verify',$data['ran_password']) }}">
	{{ $data['ran_password'] }}</a><br>
	Use this username and password to login
</body>
</html>