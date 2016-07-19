@extends('layout.master')

@section('style')
	<link rel="stylesheet" href="{{ URL::asset('style/spot-bills.css') }}">
@endsection
@section('header')
	@include('include.dashboardheader')
@endsection
@section('content')
	<div id="wrapper">
		
@include('include.sidebar');

		<div id="page-content-wrapper">
			<div class="container-fluid db-title">
				<div class="row">
					<div class="col-md-12">
						<h2 style="color: #d5d5d5;">Dashboard / Billing / Money Receipt</h2>
						<hr class="db-hr">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-push-9">
						<div class="details float">
							<h4>GET RECEIPT&nbsp;&nbsp;</h4>
							<hr>
							{!! Form::open(array('route' => 'getspotbills', 'method'=>'POST')) !!}
							<div class="row">
								<div class="form-group">
									<div class="col-sm-12">
										{!! Form::submit('GET RECEIPT',array('class' => 'btn btn-primary btn-block','name'=>'submit')) !!}
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
					<div class="col-md-9 col-sm-pull-3">
						<div class="details bill">
							@include('bills.money-receipt')
						</div>
					</div>
				</div>
			</div>
		</div>

<script>


		$("#menu-toggle").click( function(e){
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});

	</script>

@endsection