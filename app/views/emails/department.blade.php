<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Dear {{$name}},</h2> 
		<h4>Welcome to Equality and Diversity</h4>

		<p>The account has been created for you, as a head of {{$department}} department.
		<p>Please click on this link: {{ URL::route('activate', $code) }} to set up the password.</p>

	</body>
</html>