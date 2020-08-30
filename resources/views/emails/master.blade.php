<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body style="margin: 0px; padding: 0px; background-color: #f3f3f3;">

	<div style="width: 60%; max-width: 600px; margin: 0px auto; display: block;">
		<img src="{{ url('static/images/linio-banner.png') }}" style="width: 100%; margin-top: 10px; display: block;">

		<div style="background-color: #fff; padding: 24px;">
			@yield('content')

		</div>
	</div>

</body>
</html>