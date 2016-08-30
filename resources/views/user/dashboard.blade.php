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
					<div class="col-md-6">
						<a href="{{ url('/dashboard/offline-docs')}}" class="btn btn-default btn-block offline-docs">
							<span class="glyphicon glyphicon-file"></span>&nbsp;Offline Documents
						</a>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<a class="btn btn-lg btn-primary btn-block shcut" href="{{ url('/dashboard/feedbacks')}}">
								<span class="glyphicon glyphicon-comment"></span>&nbsp;Feedback 
								</a>
							</div>
							<div class="col-md-6">
								<button type="button" class="btn btn-lg btn-warning btn-block shcut" data-toggle="modal" data-target="#ContactUs">
								<span class="glyphicon glyphicon-earphone"></span>&nbsp;Contact Us 
								</button>
							</div>
						</div>
						<!--<div class="row">
							<div class="col-md-12">
								<a class="btn btn-lg btn-danger btn-block shcut">
								<span class="glyphicon glyphicon-phone"></span>&nbsp;Download App 
								</a>
							</div>
						</div>-->
																
					
											
					
											
					</div>
					

				</div>

			</div>
		</div>
	</div>


	<div class="modal fade" id="ContactUs" role="dialog">
    	<div class="modal-dialog">
      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title" style="text-align: center;">CONTACT US</h4>
        		</div>
        		<div class="modal-body">
          			<p style="text-align: center;"><strong>Call Our 24*7 Comusmer Care</strong></p>
          			<p style="text-align: center;">933 833 4444</p>
          			<p style="text-align: center;">0674 301 4444</p>
          			<br>
          			<p style="text-align: center;"><strong>Mail at</strong></p>
          			<p style="text-align: center;">care@ourcesu.com</p>
          			<br>
          			<p style="text-align: center;"><strong>Write to</strong></p>
          			<p style="text-align: center;">Riverside Utilities Pvt. Ltd, 370/373, Highway Honda </p>
          			<p style="text-align: center;">Complex. NH5, Rudrapur, Pahala, Bhubaneshwar - </p>
          			<p style="text-align: center;">752101, Odisha, India.</p>
          			<br>
          			<p style="text-align: center;"><strong>Meet us at</strong></p>
          			<p style="text-align: center;">Service Unit: 551, PRATAPRUDRAPUR </p>

        		</div>
        		<div class="modal-footer">
          			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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