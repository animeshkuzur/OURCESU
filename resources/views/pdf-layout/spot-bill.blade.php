<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<style type="text/css">
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
				<h1><strong>CESU</strong></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 title">
				<h4>ELECTRICITY BILL {{ substr($dat->BillMonth,0,4)."-".substr($dat->BillMonth,4,5) }} </h4>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 title">
				<h4>DUE DATE {{ $dat->due_date }}</h4>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-6 left">
				<strong>ACC NO. </strong>
			</div>
			<div class="col-xs-6 right">
				<strong>{{$dat->CONS_ACC}}</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 left">
				<strong>OLD ACC NO. </strong>
			</div>
			<div class="col-xs-6 right">
				<strong>{{$dat->CONS_ACC}}</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				{{ \Auth::user()->name }}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				{{$dat->ADDRESS}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				{{$dat->ADDRESS}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				{{$dat->ADDRESS}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				Route/Walking Seq 
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12 title">
				<h4>YOUR CONSUMPTION</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 left">
				CURR READING
			</div>
			<div class="col-xs-6 right">
				{{$dat->PRS_READ}}&nbsp;&nbsp;&nbsp;{{$dat->READ_REMARK}}&nbsp;&nbsp;&nbsp;29-05-16
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 left">
				PREV READING
			</div>
			<div class="col-xs-6 right">
				{{$dat->PRV_READ}}&nbsp;&nbsp;&nbsp;21-05-16
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 left">
				UNITS CONSUMED
			</div>
			<div class="col-xs-6 left">
				{{$dat->UNITS_BILLED}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 left">
				UNITS BILLED
			</div>
			<div class="col-xs-6 left">
				{{$dat->UNITS_BILLED}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 left">
				MTR STATUS/MDI
			</div>
			<div class="col-xs-6 left">
				{{$dat->MTR_STAT}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 left">
				BILL BASIS
			</div>
			<div class="col-xs-6 left">
				{{$dat->BILL_BASIS}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 left">
				SLAB FOR
			</div>
			<div class="col-xs-6 left">
				{{$dat->NO_OF_MONTHS}} MONTH
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12 title">
				<h4>YOUR CURRENT DEMAND</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 left">
				Slab1 50x2.50=125.00
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 left">
				Slab2 150x4.20=630.00
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 left">
				Slab3 110x5.20=572.00
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-8 left">
				ENERGY CHARGE
			</div>
			<div class="col-xs-4 right">
				1327.00
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				MONTHLY FIXED CHARGE
			</div>
			<div class="col-xs-4 right">
				20
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				ELECTRICITY DUTY
			</div>
			<div class="col-xs-4 right">
				53.08
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				TOTAL
			</div>
			<div class="col-xs-4 right">
				1400.08
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-12 title">
				<h4>YOUR ACCOUNT SUMMARY</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				LAST BILL
			</div>
			<div class="col-xs-4 right">
				859.47
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				ADJUSTMENT
			</div>
			<div class="col-xs-4 right">
				-1239.47
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				LAST BILL ADJUSTED
			</div>
			<div class="col-xs-4 right">
				-380.00
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-8 left">
				PAYMENT
			</div>
			<div class="col-xs-4 right">
				0.00
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				REBATE AVAILED
			</div>
			<div class="col-xs-4 right">
				0.00
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				NET ARREAR
			</div>
			<div class="col-xs-4 right">
				-380.00
			</div>
		</div><BR>
		<div class="row">
			<div class="col-xs-8 left">
				CURRENT BILL
			</div>
			<div class="col-xs-4 right">
				1400.00
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-8 left">
				AMOUNT DUE
			</div>
			<div class="col-xs-4 right">
				1020.00
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				REBATE ALLOWABLE
			</div>
			<div class="col-xs-4 right">
				31.00
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				AMT DUE BY DUE DATE
			</div>
			<div class="col-xs-4 right">
				989.08
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-12 title">
				<h4>PAYMENT MADE BY YOU</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 ">
				You have not made any payment. If you do not pay this bill, you will be leviable to LPSC.
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-12 title">
				<h4>ARREAR DETAILS</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				Current FY Arrear
			</div>
			<div class="col-xs-4 right">
				-380.00
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				Prior FY Arrear
			</div>
			<div class="col-xs-4 right">
				0.00
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 left">
				Disputed Arrear
			</div>
			<div class="col-xs-4 right">
				0.00
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-12 title">
				<h4>CONNECTION DETAILS</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4 left">
				Div/SU
			</div>
			<div class="col-xs-8 right">
				NED/Sallo
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4 left">
				Category
			</div>
			<div class="col-xs-8 right">
				Domestic/1.00kW
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4 left">
				Mtr No.
			</div>
			<div class="col-xs-8 right">
				
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-4 left">
				Bill No.
			</div>
			<div class="col-xs-8 right">
				45646465645646456
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4 left">
				Date
			</div>
			<div class="col-xs-8 right">
				29-05-16
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4 left">
				Device No
			</div>
			<div class="col-xs-8 right">
				3545645646456456
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-12 title">
				<h4>BILL ISSUED BY<h4>
				<h8>RIVERSIDE UTILITIES Pvt. Ltd.</h8> 
				<h4>FRANCISE OF OURCESU</h4>
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-12 title">
				For Any Clarification Call 24x7<br>
				933 833 4444 OR 0674 301 4444
			</div>
		</div><br><br>
	</div>