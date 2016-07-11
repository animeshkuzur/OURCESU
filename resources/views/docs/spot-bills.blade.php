@extends('layout.master')

@section('style')
	<link rel="stylesheet" href="{{ URL::asset('style/spot-bills.css') }}">
@endsection
@section('header')
	@include('include.dashboardheader')
@endsection
@section('content')
	<div id="wrapper">
		
		<!------Sidebar-wrapper------>
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav" id="accordion1">
				<li class="sidebar-brand"><a href="#">Hi &nbsp;{{ \Auth::user()->name }}&nbsp;!</a></li>
				<li class="active"><a href="{{ url('/dashboard') }}">Dashboard<span class="glyphicon glyphicon-dashboard"></span></a></li>
				<li><a data-toggle="collapse" data-parent="#accordion1" href="#meter">Metering<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="meter" class="collapse">
	                    <li><a href="#">Meter Protocol Sheet</a></li>
	                    <li><a href="#">Seal Replacement Protocol</a></li>
	                    <li><a href="#">Meter Change Notice</a></li>
               		</ul>
				</li>
				<li><a data-toggle="collapse" data-parent="#accordion1" href="#bills">Bills<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="bills" class="collapse">
	                    <li><a href="{{ url('/dashboard/spot-bills') }}">Spot Bills</a></li>
	                    <li><a href="#">SAP Bills</a></li>
	                    <li><a href="#">12 Months Bill</a></li>
	                    <li><a href="#">Money Receipt</a></li>
	                    <li><a href="#">Complaints Letter Format</a></li>
               		</ul>
				</li>
				<li><a data-toggle="collapse" data-parent="#accordion1" href="#comp">Compliance Lists<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="comp" class="collapse">
	                    <li><a href="#">Inspection Report</a></li>
	                    <li><a href="#">Provisional Assessment form</a></li>
	                    <li><a href="#">Final Assessment</a></li>
               		</ul>
				</li>
				<li></li>
				<li><a href="{{ url('/dashboard/settings')}}">Settings<span class="glyphicon glyphicon-cog"></span></a></li>
				@if(\Auth::check())
				<li><a href="{{ url('/logout')}}">Logout<span class="glyphicon glyphicon-off"></span></a></li>
				@else
				<li>{!! Html::linkRoute('login', 'Login') !!}</li>
				@endif
				<li>

				</li>
			</ul>
		</div>

		<!------Content------>
		<div id="page-content-wrapper">
			<div class="container-fluid db-title">
				<div class="row">
					<div class="col-md-12">
						<h2 style="color: #d5d5d5;">Dashboard / Bills / Spot Bills</h2>
						<hr class="db-hr">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-sm-push-8">
						<div class="details">
							<h4>Select Date</h4>
							<hr>
							{!! Form::open(array('route' => 'getspotbills', 'method'=>'POST')) !!}
							<div class="row">
								<div class="form-group">
									<label for="date" class="col-sm-4 control-label">Date:</label>
									<div class="col-sm-8">
										{!! Form::select('date', $item2, null,array('class' => 'form-control','id'=>'year','title'=>'Select Date')); !!}
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-12">
										{!! Form::submit('GET BILL',array('class' => 'btn btn-primary btn-block','name'=>'submit')) !!}
									</div>
								</div>
							</div>
							{!! Form::close() !!}
							<p><hr></p>
							<div class="row">
								<div class="col-md-12">
									<a class="btn btn-danger btn-block disabled" href="#" role="button">DOWNLOAD</a>	
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-sm-pull-4">
						<div class="details">
							
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

		<!----Menu Toggle Script and Graph---->
	<script>


		$("#menu-toggle").click( function(e){
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});

	</script>

@endsection