<style type="text/css">
		.body{
			background: white;
		}
		.container-b{
			color: black;
			max-width:330px;
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
		<div class="row">
			<div class="col-xs-12 title">
				<h2><strong>CESU</strong></h2>
				<h5>CENTRAL ELECTRICITY SUPPLY</h5>
				<h5>UTILITY OF ODISHA</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 title">
				<hr style="margin:0px;padding:0px;border: dashed 1px black;">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 title">
				<h5><strong>PAYMENT RECEIPT</strong></h5>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5 left">
				NO
			</div>
			<div class="col-xs-2">:</div>
			<div class="col-xs-5 right">
				{{ $dat->BOOK_NO }}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5 left">
				DATE
			</div>
			<div class="col-xs-2">:</div>
			<div class="col-xs-5 right">
				{{ substr($dat->EntryDate,0,strpos($dat->EntryDate," ")) }}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5 left">
				A/C No
			</div>
			<div class="col-xs-2">:</div>
			<div class="col-xs-5 right">
				{{$dat->DIVISION." ".$dat->CONTRACT_ACC}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5 left">
				CATEGORY
			</div>
			<div class="col-xs-2">:</div>
			<div class="col-xs-5 right">
				{{$dat->CATEGORY}}
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-12 left">
				<p>{{\Auth::user()->name}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5 left">
				AMOUNT
			</div>
			<div class="col-xs-2">:</div>
			<div class="col-xs-5 left">
				{{$dat->REVENUE_AMT}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5 left">
				MODE
			</div>
			<div class="col-xs-2">:</div>
			<div class="col-xs-5 left">
				{{$dat->PAY_MODE}}
			</div>
		</div>
		@if(strtoupper($dat->PAY_MODE) == 'CHEQUE')
			<div class="row">
				<div class="col-xs-5 left">
				BANK
				</div>
				<div class="col-xs-2">:</div>
				<div class="col-xs-5 left">
					{{$dat->BANK_NAME}}
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5 left">
				CHEQUE NO.
				</div>
				<div class="col-xs-2">:</div>
				<div class="col-xs-5 left">
					{{$dat->CHEQE_NO}}
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5 left">
				CHEQUE DATE
				</div>
				<div class="col-xs-2">:</div>
				<div class="col-xs-5 left">
					{{$dat->CHEQE_DATE}}
				</div>
			</div>
		@endif
		<div class="row">
			<div class="col-xs-5 left">
				PAYMENT DATE
			</div>
			<div class="col-xs-2">:</div>
			<div class="col-xs-5 left">
				{{$dat->PAY_DATE}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5 left">
				COLLECTOR
			</div>
			<div class="col-xs-2">:</div>
			<div class="col-xs-5 left">
				{{$dat->BC_CODE}}
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-12 title">
				ANY MESSAGE WILL PRINT HERE
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-12 title">
				<strong><p>RECEIPT ISSUED BY<br>
				Riverside Utility Pvt. Ltd.<br>
				FRANCHISE OF CESU</p></strong>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 title">
				<p>For any clarification call 24x7<br>
				933 833 4444 &nbsp;or&nbsp; 0674 301 4444</p>
			</div>
		</div><br>
	</div>