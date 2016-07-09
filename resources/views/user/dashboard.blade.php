@extends('layout.master')

@section('style')
	<link rel="stylesheet" href="{{ URL::asset('style/dashboard.css') }}">
	<script src="{{ URL::asset('bootstrap/js/morris.min.js') }}"></script>
	<script src="{{ URL::asset('bootstrap/js/raphael-min.js') }}"></script>
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
	                    <li><a href="#">Spot Bills</a></li>
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
						<h2 style="color: #d5d5d5;">Dashboard</h2>
						<hr class="db-hr">
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="graph" id="graph"></div>
					</div>
					<div class="col-md-4">
					<div class="row">
						<div class="col-md-12">
						<div class="reading">
							<div class="content">
							<h4>Last Month's Reading</h4>
							</div>
							<hr>
							@foreach($data as $dat)
							@endforeach
							<p><strong>{{$dat->UNITS_BILLED}}&nbsp;Units</strong></p>
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						<div class="reading">
							<div class="content">
							<h4>Last Month's Bill</h4>
							</div>
							<hr>
							@foreach($data as $dat)
							@endforeach
							<p><strong>₹&nbsp;{{$dat->CUR_BILL}}</strong></p>
						</div>
						</div>
					</div>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12">
					<div class="notice">
					<div class="alert alert-info alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Notice:</strong><br>
						Manage all your bills from this dashboard! Make use of the dashboard widgets like "Cost/Consumption Graph" or "Info Tab" displaying the graph of all bill/units consumed this year and last month's bill/Units Consumed respectively.
					</div>
					</div>
				</div>
				</div>

				<div class="row">
				<div class="col-md-12">
					<div class="reading" style="height: 50px;">
					
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

		window.m = Morris.Line({
        element: 'graph',
        data: [
        @foreach($data as $dat)
        	{period: "{{substr($dat->BillMonth,0,4)."-".substr($dat->BillMonth,4,2)}}", cost: {{$dat->CUR_BILL}}, units: {{$dat->UNITS_BILLED}} },
        @endforeach
        ],
        xkey: 'period',
        ykeys: ['cost','units'],
        xLabels:'month',
        labels: ['cost','units'],
        hideHover: 'auto',
        resize: true,
      });
	</script>
@endsection