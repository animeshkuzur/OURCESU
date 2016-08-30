<!------Sidebar-wrapper------>
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav" id="accordion1">
				<li class="sidebar-brand"><a href="#">Hi &nbsp;{{ substr(\Auth::user()->name,0,strpos(\Auth::user()->name,' ')) }}&nbsp;!</a></li>
				<li><a href="{{ url('/dashboard') }}">Dashboard<span class="glyphicon glyphicon-dashboard"></span></a></li>
				<li>
					<a data-toggle="collapse" data-parent="#accordion1" href="#consumer">Consumer Care<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="consumer" class="collapse">
						<li><a href="{{ url('/dashboard/service-request') }}">Service Requested</a></li>
						<li><a href="{{ url('/dashboard/foc-slip') }}">FOC Slip</a></li>
					</ul>
				</li>
				<li>
					<a data-toggle="collapse" data-parent="#accordion1" href="#connection">Connection<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="connection" class="collapse">
						<li><a href="{{ url('/dashboard/demand-note') }}">Demand Note</a></li>
					</ul>
				</li>
				<li><a data-toggle="collapse" data-parent="#accordion1" href="#meter">Metering<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="meter" class="collapse">
	                    <li><a href="{{ url('/dashboard/meter-protocol') }}">Meter Protocol Sheet</a></li>
	                    <li><a href="{{ url('/dashboard/seal-replacement') }}">Seal Replacement Protocol</a></li>
	                    <li><a href="{{ url('/dashboard/meter-change') }}">Meter Change Notice</a></li>
               		</ul>
				</li>
				<li><a data-toggle="collapse" data-parent="#accordion1" href="#bills">Billing<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="bills" class="collapse">
	                    <li><a href="{{ url('/dashboard/spot-bills') }}">Spot Bills</a></li>
	                    <li><a href="{{url('/dashboard/sap-bills')}}">SAP Bills</a></li>
	                    <li><a href="#">12 Months Bill</a></li>
               		</ul>
				</li>
				
				<li><a data-toggle="collapse" data-parent="#accordion1" href="#coll">Collection<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="coll" class="collapse">
						<li><a href="{{url('/dashboard/e-mobile-receipts')}}">E-Money Receipt</a></li>
	                    <li><a href="{{url('/dashboard/money-receipts')}}">Money Receipt</a></li>
               		</ul>
				</li>

				<li>
					<a data-toggle="collapse" data-parent="#accordion1" href="#recovery">Recovery<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="recovery" class="collapse">
						<li><a href="{{ url('/dashboard/disconnect-notice') }}">Disconnection Notice</a></li>
						<li><a href="#">RC/DC Protocol</a></li>
					</ul>
				</li>

				<li><a data-toggle="collapse" data-parent="#accordion1" href="#comp">Enforcement<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="comp" class="collapse">
	                    <li><a href="{{url('/dashboard/inspection-report')}}">Inspection Report</a></li>
	                    <li><a href="{{url('/dashboard/provisional-ass')}}">Provisional Assessment</a></li>
	                    <li><a href="{{url('/dashboard/final-ass')}}">Final Assessment</a></li>
               		</ul>
				</li>
				
				<li>

				</li>
			</ul>
		</div>