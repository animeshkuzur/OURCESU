<!DOCTYPE html>
<html lang="en">
	<head>
		<title>OURCESU</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('style/style.css') }}">
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
		<script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
	</head>
	<body>
		<!-----------header------------>
		<div class="header">
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="col-md-4">
						<div class="navbar-brand">
							<img src="{{URL::asset('images/logo.png')}}" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div>
		@yield('content')
	</body>
</html>