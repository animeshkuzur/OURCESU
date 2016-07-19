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
						<h2 style="color: #d5d5d5;">Dashboard / Billing / E-Money Receipt</h2>
						<hr class="db-hr">
					</div>
				</div>
				@if(!empty($item2))
				<div class="row">
					<div class="col-md-3 col-sm-push-9">
						<div class="details float">
							<h4>Select Date</h4>
							<hr>
							{!! Form::open(array('route' => 'getemobilereceipt', 'method'=>'POST')) !!}
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
					<div class="col-md-9 col-sm-pull-3">
						<div class="details bill">
						@if(isset($data))
							@foreach($data as $dat)
							@endforeach
							@include('bills.e-mobile-receipt')
						@endif
						</div>
					</div>
				</div>
				@endif
				@if(empty($item2))
					<div class="row">
						<div class="col-md-12">
							<div class="details bill">
							<br>
								<h1 style="text-align: center;"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;&nbsp;NO RECORD FOUND!</h1>
								<br><br>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>

<script>


		$("#menu-toggle").click( function(e){
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});

	</script>

@endsection