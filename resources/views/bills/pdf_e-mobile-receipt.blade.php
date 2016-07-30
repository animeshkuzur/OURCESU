<!DOCTYPE html>
<!-- This Website is developed by Animesh A. Kuzur @ TNine Infotech -->
<html lang="en">
	<head>
	@include('include.head')
	</head>
	<body>
	@foreach($data as $dat)
		@include('bills.e-mobile-receipt')
	@endforeach
	</body>
</html>