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
						<h2 style="color: #d5d5d5;">Dashboard / Offline Documents</h2>
						<hr class="db-hr">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="details bill">
							<div class="row">
								<div class="col-md-12">
									@if(!empty($data))
										<div class="table-responsive">
											<table class="table table-stripped">
												<thead>
												  <tr style="font-size: 12px;">
											        <th>Document No.</th>
											        <th>Document Title</th>
											        <th>View</th>
											      </tr>
												</thead>
												<tbody>
										    	@foreach($data as $dat)
										      	<tr style="font-size: 12px;">
										        	<td>{{ $dat->DOC_NO }}</td>
										        	<td>{{ $dat->DOC_TITLE }}</td>
										        	<td>
										        		<button type="button" class="btn btn-sm btn-default btn-block" data-toggle="modal" data-target= {{ '#DOC'.$dat->DOC_NO }} >View</button>
										        	</td>

										        	<div class="modal fade" id= {{ 'DOC'.$dat->DOC_NO }} role="dialog">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header">
														   			<button type="button" class="close" data-dismiss="modal">&times;</button>
														   			<h4 class="modal-title" style="text-align: center;"><b>{{ $dat->DOC_TITLE }}</b></h4>
														   		</div>
														   		<div class="modal-body">
																	<img src="{{ 'http://223.30.127.83:81/ConsDoc/'.$dat->DOC_VIRTUAL_NAME }}" class="img-responsive" />
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
											</table>
										</div>
									@endif
									@if(empty($data))
										<br>
										<h3 style="text-align: center;">No Records Found!</h3>
										<br>
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