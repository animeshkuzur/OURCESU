<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<style type="text/css">
		.body{
			background: white;
		}
		.container-b{
			color: black;
			border: 1px solid black;
			padding-left: 5px;
			padding-right: 5px;
			margin-left: auto;
			margin-right: auto; 

		}
		.title{
			text-align: center;
		}
		.left{
			text-align: left;
		}
		.right{
			text-align: right;
		}
	</style>
	<div class="container-b">
	<h4 class="modal-title" style="text-align: center;"><b>Acknowledgement Slip</b></h4>
	<hr>
	<br>
														   		
														   		
																	<div class="row">
																		<div class="col-xs-6">
																			<b>Date:</b> {{ substr($dat->EntryDate,0,10) }}
																		</div>
																		<div class="col-xs-6">
																			<b>Time:</b> {{ substr($dat->EntryDate,11,8) }}
																		</div>
																	</div><br>
																	<div class="row">
																		<div class="col-xs-6">
																			<b>Refrence No.:</b>
																		</div>
																		<div class="col-xs-6">
																			<b>Name:</b> {{ $dat->REQUESTEDBY }}
																		</div>
																	</div><br>
																	<div class="row">
																		<div class="col-xs-6">
																			<b>Service No.:</b> {{ $dat->REQ_NO }}
																		</div>
																		<div class="col-xs-6">
																			<b>Address:</b>
																		</div>
																	</div><br>
																	<div class="row">
																		<div class="col-xs-6">
																			<b>Complaint Type:</b> {{ $dat->SERVICE_TYPE_NAME }}
																		</div>
																		<div class="col-xs-6">
																			<b>Sub Type:</b> {{ $dat->SERVICE_TYPE_GROUP_NAME }}
																		</div>
																	</div><br>
																	<div class="row">
																		<div class="col-xs-12">
																			<b>Remark:</b> {{ $dat->REMARKS }}
																		</div>	
																	</div><br>
																	<div class="row">
																		<div class="col-xs-3"></div>
																		<div class="col-xs-3"></div>
																		<div class="col-xs-3"></div>
																		<div class="col-xs-3">
																			<img src="{{ URL::asset('images/logo.png') }}" class="img-responsive">
																		</div>
																	</div>
</div>													   		