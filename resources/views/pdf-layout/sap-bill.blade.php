	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<style type="text/css">
		.container-b{
			color: black;
			max-width:820px;
			border: 1px solid black;
			margin-left: auto;
			margin-right: auto;
			padding-left: 5px;
			padding-right: 5px;
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
		.sap-logo{
			height: 40%;
			width: 40%;
		}
		.sec{
			border: 1px solid black;
			padding: 5px;	
		}
		.sap-tab{
			font-size: 13px;
		}
		.sap-tab-bor{
			border: 1px solid black;
			text-align: center;
		}
		.sap-tab-cont{
			font-size: 11px;
		}
	</style>
	<div class="container-b">
		<div class="row">
			<div class="col-xs-4">
				<img src="{{ URL::asset('images/logo_cesu.png') }}" class="sap-logo img-responsive">
			</div>
			<div class="col-xs-8 title">
				<h3>Electricity Bill - May 2016</h3>
				[BARCODE]
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4 left">
			<br>
				<strong>ANIMESH AMAN KUJUR</strong><br><br>
				<strong>ADDRESS LINE #1</strong><br><br>
				<strong>524/65 sd/adadas</strong><br><br>
				<strong>ADDRESS LINE #3</strong><br><br>
			</div>
			<div class="col-xs-8">
				<div class="sec">
					<div class="row ">
						<div class="col-xs-6">
							<strong><h3>DUE DATE</h3></strong>
						</div>
						<div class="col-xs-6">
							<strong><h3>16-05-2016</h3></strong>
						</div>
					</div>
					<div class="row ">
						<div class="col-xs-6">
							CONSUMER A/C OLD/NEW
						</div>
						<div class="col-xs-6">
							84157456
						</div>
					</div>
					<div class="row ">
						<div class="col-xs-6">
							CONSUMER ID OLD/NEW
						</div>
						<div class="col-xs-6">
							84157456
						</div>
					</div>
					<div class="row ">
						<div class="col-xs-6">
							Route No.
						</div>
						<div class="col-xs-6">
							542-52
						</div>
					</div>
					<div class="row ">
						<div class="col-xs-6">
							BILL NO.
						</div>
						<div class="col-xs-6">
							84157456
						</div>
					</div>
					<div class="row ">
						<div class="col-xs-6">
							BILL DATE
						</div>
						<div class="col-xs-6">
							12-05-2016
						</div>
					</div>
					<div class="row ">
						<div class="col-xs-6">
							BILL PERIOD
						</div>
						<div class="col-xs-6">
							12-04-2016 - 12-05-2016
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="col-xs-12">
			<table style="width:100%">
  				<tr class="title sap-tab">
    				<th class="sap-tab-bor">Last Bill</th>
					<th>-</th>
				    <th class="sap-tab-bor">Payment + Rebate</th>
					<th>=</th>
				    <th class="sap-tab-bor">Net Arrear</th>
					<th>+</th>
					<th class="sap-tab-bor">Present Bill</th>
					<th>+</th>
					<th class="sap-tab-bor">Adjustment</th>
					<th>=</th>
					<th class="sap-tab-bor">Pay Before Due dt.</th>
					<th>&nbsp;</th>
					<th class="sap-tab-bor">Pay After Due dt.</th>
			    </tr>
  				<tr class="sap-tab">
    				<td class="sap-tab-bor">0.00</td>
    				<td></td>
    				<td class="sap-tab-bor">0.00+</td>
    				<td></td>
    				<td class="sap-tab-bor">0.00</td>
    				<td></td>
    				<td class="sap-tab-bor">1028.80</td>
    				<td></td>
    				<td class="sap-tab-bor"></td>
    				<td></td>
    				<td class="sap-tab-bor">1000</td>
    				<td></td>
    				<td class="sap-tab-bor">1029</td>
  				</tr>
			</table>	
		</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-4">
				<table style="width:100%">
					<tr class="title sap-tab">
						<th class="sap-tab-bor">Your Consumption</th>
					</tr>
					<tr class="sap-tab">
						<td class="sap-tab-bor">
							<div class="row sap-tab-cont">
								<div class="col-xs-4 left">Current Reading</div>
								<div class="col-xs-2">-</div>
								<div class="col-xs-2">HL</div>
								<div class="col-xs-4 right">15-05-2016</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-4 left">Previous Reading</div>
								<div class="col-xs-2">0</div>
								<div class="col-xs-2">OK</div>
								<div class="col-xs-4 right">09-10-2015</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Consumption</div>
								<div class="col-xs-6 left">0</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Bill Basis</div>
								<div class="col-xs-6 left">PROVISIONAL</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Billed For</div>
								<div class="col-xs-6 left">210 days</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Slab For</div>
								<div class="col-xs-6 left">7 Months</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">MDI</div>
								<div class="col-xs-6 left">2</div>
							</div>
						<br>
						<br>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-4">
				<table style="width:100%">
					<tr class="title sap-tab">
						<th class="sap-tab-bor">Your Present Month Bill</th>
					</tr>
					<tr class="sap-tab">
						<td class="sap-tab-bor">
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">MMFC</div>
								<div class="col-xs-6 left">280.00</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Energy Charges</div>
								<div class="col-xs-6 left">720.00</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Slab 288x2.5</div>
								<div class="col-xs-6 left">720</div>
							</div>
							<br><br>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Electricity Duty</div>
								<div class="col-xs-6 left">28.80</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Meter Rent</div>
								<div class="col-xs-6 left">0.00</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Delay Payment Surcharge</div>
								<div class="col-xs-6 left">0.00</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">HL Adjustment</div>
								<div class="col-xs-6 left">0</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Present Bill</div>
								<div class="col-xs-6 left">1028.80</div>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-4">
				<table style="width:100%">
					<tr class="title sap-tab">
						<th class="sap-tab-bor">Your Arrear & Net Bill</th>
					</tr>
					<tr class="sap-tab">
						<td class="sap-tab-bor">
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Last Bill</div>
								<div class="col-xs-6 left">0.00</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Payment</div>
								<div class="col-xs-6 left">0.00</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Rebate Availed</div>
								<div class="col-xs-6 left">0.00</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Net Arrear</div>
								<div class="col-xs-6 left">0.00</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Present Bill</div>
								<div class="col-xs-6 left">1028.80</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Other Adjustment</div>
								<div class="col-xs-6 left">0.00</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Rebate</div>
								<div class="col-xs-6 left">28.80</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Pay Before Due Dt.</div>
								<div class="col-xs-6 left">1000</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Pay After Due Dt.</div>
								<div class="col-xs-6 left">1029</div>
							</div>
							<br><br>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12">
				<table style="width:100%">
					<tr class="title sap-tab">
						<th class="sap-tab-bor">Past Bill Details</th>
					</tr>
					<tr class="sap-tab">
						<td class="sap-tab-bor">
							<div class="row sap-tab-cont">
								<div class="col-xs-12">
									<table style="width:100%">
										<tr>
											<th>Month</th>
											<th>Rdg.Date</th>
											<th>Reading</th>
											<th>Status</th>
											<th>Units</th>
											<th>MMFC</th>
											<th>EC</th>
											<th>ED</th>
											<th>Mtr Rent</th>
											<th>DPS</th>
											<th>HL Adj</th>
											<th>Billed</th>
											<th>Adj</th>
											<th>Paid/Rbt</th>
											<th>Net Arrear</th>
										</tr>
										<tr>
											<td><br><br><br><br><br><br><br></td>
											
										</tr>
									</table>
								</div>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12">
				<table style="width:100%">
					<tr class="title sap-tab">
						<th class="sap-tab-bor">Message For You</th>
					</tr>
					<tr class="sap-tab">
						<td class="sap-tab-bor">
						<div class="row">
							<div class="col-sm-6"></div>
							<div class="col-sm-6 left">
								Your last payment made by
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-6"></div>
							<div class="col-sm-6 left">
								MR No. :
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6"></div>
							<div class="col-sm-6 left">
								MR Date :
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6"></div>
							<div class="col-sm-6 left">
								Amount :
							</div>
						</div>
						<br>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-4">
				<table style="width:100%">
					<tr class="title sap-tab">
						<th class="sap-tab-bor">Your Area</th>
					</tr>
					<tr class="sap-tab">
						<td class="sap-tab-bor">
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Division</div>
								<div class="col-xs-6 left">NED</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Sub Division</div>
								<div class="col-xs-6 left"></div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Section</div>
								<div class="col-xs-6 left"></div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">DT No.</div>
								<div class="col-xs-6 left"></div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Pole No.</div>
								<div class="col-xs-6 left"></div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">MRU No.</div>
								<div class="col-xs-6 left">6546546545</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Walking Sequence</div>
								<div class="col-xs-6 left">000000000</div>
							</div>
						<br>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-4">
				<table style="width:100%">
					<tr class="title sap-tab">
						<th class="sap-tab-bor">Your Connection</th>
					</tr>
					<tr class="sap-tab">
						<td class="sap-tab-bor">
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Supply Type</div>
								<div class="col-xs-6 left">LT</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Tariff Category</div>
								<div class="col-xs-6 left">DOM_LT</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Contract Demand(KW)</div>
								<div class="col-xs-6 left">2.00</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Connection Type</div>
								<div class="col-xs-6 left">Permanent</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Supply Phase</div>
								<div class="col-xs-6 left">IPH</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Energisation Date</div>
								<div class="col-xs-6 left"></div>
							</div>
							<br>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-4">
				<table style="width:100%">
					<tr class="title sap-tab">
						<th class="sap-tab-bor">Your Meter</th>
					</tr>
					<tr class="sap-tab">
						<td class="sap-tab-bor">
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">SI. No.</div>
								<div class="col-xs-6 left">126551232</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Make</div>
								<div class="col-xs-6 left">L&G</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Owner</div>
								<div class="col-xs-6 left">Customer</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Type</div>
								<div class="col-xs-6 left">Static</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">Status</div>
								<div class="col-xs-6 left">OK</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">MDI</div>
								<div class="col-xs-6 left">2</div>
							</div>
							<div class="row sap-tab-cont">
								<div class="col-xs-6 left">&nbsp;</div>
								<div class="col-xs-6 left">&nbsp;</div>
							</div>
							<br>   	
						</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12">
				<table style="width:100%">
					<tr class="title sap-tab">
						<th class="sap-tab-bor">Contact Us</th>
					</tr>
					<tr class="sap-tab">
						<td class="sap-tab-bor">
						<div class="row">
							<strong><div class="col-sm-3 left">Call Our 24*7 Comusmer Care</div>
							<div class="col-sm-3 left">Mail at:</div>
							<div class="col-sm-3 left">Write to:</div>
							<div class="col-sm-3 left">
								Meet us at:
							</div></strong>
						</div><br>
						<div class="row">
							<div class="col-sm-3 left">933 833 4444&nbsp;&nbsp;&nbsp;0674 301 4444</div>
							<div class="col-sm-3 left">care@ourcesu.com</div>
							<div class="col-sm-3 left">
								Riverside Utilities Pvt. Ltd, 370/373,
								Highway Honda Complex. NH5, Rudrapur,
								Pahala, Bhubaneshwar - 752101, Odisha, India.
							</div>
							<div class="col-sm-3 left">
								Service Unit: 551
								PRATAPRUDRAPUR
							</div>
						</div>
						<br>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-9" style="font-size: 11px">
				Service brought to you by Seaside Utilities Pvt. Ltd, a Franchise of Central Electricity Supply Utility Of Odisha for your Division appointed under section 14 of the Electricit Act 2003 vide Distribution Franchise Agreement dated January 30, 2013. 
			</div>
			<div class="col-sm-3">
				<img src="{{ URL::asset('images/logo.png') }}" class="img-responsive">
			</div>
		</div>
	</div>