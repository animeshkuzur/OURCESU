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
										        <th>Req No.</th>
										        <th>Req Datetime</th>
										        <th>Service</th>
										        <th>Req By</th>
										        <th>Requester's Mobile No.</th>
										        <th>Req Status</th>
										        
										        <th>Req Action Date</th>
										        <th>Acknowledgement Slip</th>
										      </tr>
										    </thead>
										    <tbody>
										    	@foreach($data as $dat)
										      	<tr style="font-size: 12px;">
										        	<td>{{ $dat->REQ_NO }}</td>
										        	<td>{{ $dat->EntryDate }}</td>
										        	<td>{{ $dat->SERVICE_TYPE_GROUP_NAME }} - {{ $dat->SERVICE_TYPE_NAME }}</td>
										        	<td>{{ $dat->REQUESTEDBY }}</td>
										        	<td>{{ $dat->REQUESTER_MOBILENO }}</td>
										        	<td>{{ $dat->REQ_STATUS }}</td>
										        	
										        	<td>{{ $dat->REQ_ACTION_DATE }}</td>
										        	<td>
										        		<button type="button" class="btn btn-sm btn-default btn-block" data-toggle="modal" data-target= {{ '#AckSlp'.$dat->REQ_NO }} >View</button>
										        	</td>										      	
											      	<div class="modal fade" id= {{ 'AckSlp'.$dat->REQ_NO }} role="dialog">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header">
														   			<button type="button" class="close" data-dismiss="modal">&times;</button>
														   			<h4 class="modal-title" style="text-align: center;"><b>Acknowledgement Slip</b></h4>
														   		</div>
														   		<div class="modal-body">
																	<div class="row">
																		<div class="col-md-6">
																			<b>Date:</b> {{ substr($dat->EntryDate,0,10) }}
																		</div>
																		<div class="col-md-6">
																			<b>Time:</b> {{ substr($dat->EntryDate,11,8) }}
																		</div>
																	</div><br>
																	<div class="row">
																		<div class="col-md-6">
																			<b>Refrence No.:</b>
																		</div>
																		<div class="col-md-6">
																			<b>Name:</b> {{ $dat->REQUESTEDBY }}
																		</div>
																	</div><br>
																	<div class="row">
																		<div class="col-md-6">
																			<b>Service No.:</b> {{ $dat->REQ_NO }}
																		</div>
																		<div class="col-md-6">
																			<b>Address:</b>
																		</div>
																	</div><br>
																	<div class="row">
																		<div class="col-md-6">
																			<b>Complaint Type:</b> {{ $dat->SERVICE_TYPE_NAME }}
																		</div>
																		<div class="col-md-6">
																			<b>Sub Type:</b> {{ $dat->SERVICE_TYPE_GROUP_NAME }}
																		</div>
																	</div><br>
																	<div class="row">
																		<div class="col-md-12">
																			<b>Remark:</b> {{ $dat->REMARKS }}
																		</div>	
																	</div><br>
																	<div class="row">
																		<div class="col-md-3"></div>
																		<div class="col-md-3"></div>
																		<div class="col-md-3"></div>
																		<div class="col-md-3">
																			<img src="{{ URL::asset('images/logo.png') }}" class="img-responsive">
																		</div>
																	</div>
														   		</div>
														   		<div class="modal-footer">
														   			<button type="button" class="btn btn-danger">DOWNLOAD</button>
														   			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														  		</div>
															</div>
														</div>
													</div>
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