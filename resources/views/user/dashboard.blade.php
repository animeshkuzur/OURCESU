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
		
		@include('include.sidebar');

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
					<div class="col-md-3">
						<a class="btn btn-lg btn-primary btn-block shcut">
						<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;&nbsp;&nbsp;Feedback 
						</a>					
					</div>
					<div class="col-md-3">
						<a class="btn btn-lg btn-success btn-block shcut" href="{{ url('/dashboard/settings')}}">
						<span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;&nbsp;&nbsp;Settings 
						</a>					
					</div>
					<div class="col-md-3">
						<a class="btn btn-lg btn-warning btn-block shcut">
						<span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;&nbsp;&nbsp;Contact Us 
						</a>					
					</div>
					<div class="col-md-3">
						<a class="btn btn-lg btn-danger btn-block shcut">
						<span class="glyphicon glyphicon-phone"></span>&nbsp;&nbsp;&nbsp;&nbsp;Download App 
						</a>					
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