<!DOCTYPE html>
<html>
<head>
	<title>abc</title>
</head>
<body>
<h1>{{ $data['title'] }}</h1>
<p>{{ $data['body'] }}</p>
<p><button><a href="http://127.0.0.1:8000/login/{{$data['dataid']}}">Click here to login with your email id and password</a></button></p>
</body>
</html>