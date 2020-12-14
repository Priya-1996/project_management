<!DOCTYPE html>
<html>
<head>
	<title>abc</title>
</head>
<body>
<h1>{{ $data['title'] }}</h1>
<p>{{ $data['body'] }}</p>
<p><a href="{{ route('verify',$data['email_verification_code']) }}">
	{{ route('verify',$data['email_verification_code']) }} <--Click here to get activated.
</body>
</html>