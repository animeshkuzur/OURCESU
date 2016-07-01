@extends('layout.master')

@section('style')
	<link rel="stylesheet" href="{{ URL::asset('style/dashboard.css') }}">
@endsection
@include('include.dashboardheader')
@section('content')
	<div id="wrapper">
		
		<!------Sidebar-wrapper------>
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li class="sidebar-brand"><a href="#">Hi {{ \Auth::user()->name }}!</a></li>
				<li><a href="#">Metering</a></li>
				<li><a href="#">Bills</a></li>
				<li><a href="#">Compliance / Enforcement Lists</a></li>
				<li><br></li>
				<li><a href="#">Settings</a></li>
				@if(\Auth::check())
				<li>{!! Html::linkRoute('logout', 'Logout') !!}</li>
				@else
				<li>{!! Html::linkRoute('login', 'Login') !!}</li>
				@endif
			</ul>
		</div>

		<!------Content------>
		<div id="page-content-wrapper">
			<div class="container-fluid db-title">
				<div class="row">
					<div class="col-md-12">
						<h2 style="color: #d5d5d5;">Dashboard</h2>
						<hr class="db-hr">
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="graph"></div>
					</div>
					<div class="col-md-4">
						<div class="reading"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-"></div>
				</div>
			</div>
		</div>
	</div>

	<!----Menu Toggle Script---->
	<script>
		$("#menu-toggle").click( function(e){
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>
@endsection