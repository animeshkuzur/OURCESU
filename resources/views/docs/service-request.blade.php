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
						<h2 style="color: #d5d5d5;">Dashboard / Service Request</h2>
						<hr class="db-hr">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-push-9">
						<div class="details float">
							<h4>Create New Request</h4>
							<hr>
							{!! Form::open(array('route' => 'getemobilereceipt', 'method'=>'POST')) !!}
							<div class="row">
								<div class="form-group">
									<div class="col-sm-12">
										{!! Form::submit('CREATE',array('class' => 'btn btn-primary btn-block','name'=>'submit')) !!}
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
							<div class="row">
								<div class="col-md-12">
									<h3>Previous Requests</h3>
									<hr>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									@if(!empty($data))
									<div class="table-responsive">
										<table class="table table-striped">
										    <thead>
										      <tr style="font-size: 12px;">
										        <th>REQ No.</th>
										        <th>SERVICE</th>
										        <th>REQ By</th>
										        <th>REQUESTER's MOBILE No.</th>
										        <th>REQ ACTION By</th>
										        <th>REQ ACTION DATE</th>
										        <th>REMARKS</th>
										      </tr>
										    </thead>
										    <tbody>
										    	@foreach($data as $dat)
										      	<tr style="font-size: 12px;">
										        	<td>{{ $dat->REQ_NO }}</td>
										        	<td>{{ $dat->SERVICE_TYPE_GROUP_NAME }} - {{ $dat->SERVICE_TYPE_NAME }}</td>
										        	<td>{{ $dat->REQUESTEDBY }}</td>
										        	<td>{{ $dat->REQUESTER_MOBILENO }}</td>
										        	<td>{{ $dat->REQ_ACTION_BY }}</td>
										        	<td>{{ $dat->REQ_ACTION_DATE }}</td>
										        	<td>{{ $dat->REMARKS }}</td>
										      	</tr>
										      	@endforeach
										    </tbody>
										</table>
									</div>
									@endif

									@if(empty($data))
										<h3 style="text-align: center;">No Requests made!</h3>
									@endif
								</div>
							</div>
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