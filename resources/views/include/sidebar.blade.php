<!------Sidebar-wrapper------>
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav" id="accordion1">
				<li class="sidebar-brand"><a href="#">Hi &nbsp;{{ substr(\Auth::user()->name,0,strpos(\Auth::user()->name,' ')) }}&nbsp;!</a></li>
				<li><a href="{{ url('/dashboard') }}">Dashboard<span class="glyphicon glyphicon-dashboard"></span></a></li>
				<li><a data-toggle="collapse" data-parent="#accordion1" href="#coll">Collection<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="coll" class="collapse">
						<li><a href="{{url('/dashboard/e-mobile-receipts')}}">E-Mobile Receipt</a></li>
	                    <li><a href="{{url('/dashboard/money-receipts')}}">Money Receipt</a></li>
               		</ul>
				</li>
				<li><a data-toggle="collapse" data-parent="#accordion1" href="#meter">Metering<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="meter" class="collapse">
	                    <li><a href="#">Meter Protocol Sheet</a></li>
	                    <li><a href="#">Seal Replacement Protocol</a></li>
	                    <li><a href="#">Meter Change Notice</a></li>
               		</ul>
				</li>
				<li><a data-toggle="collapse" data-parent="#accordion1" href="#bills">Billing<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="bills" class="collapse">
	                    <li><a href="{{ url('/dashboard/spot-bills') }}">Spot Bills</a></li>
	                    <li><a href="{{url('/dashboard/sap-bills')}}">SAP Bills</a></li>
	                    <li><a href="#">12 Months Bill</a></li>

	                    <li><a href="#">Complaints Letter Format</a></li>
               		</ul>
				</li>
				<li><a data-toggle="collapse" data-parent="#accordion1" href="#payment">Payments<span class="glyphicon glyphicon-chevron-down"></span></a>
				<li><a data-toggle="collapse" data-parent="#accordion1" href="#service">Service Requested<span class="glyphicon glyphicon-chevron-down"></span></a>
				<li></li>
								<li><a data-toggle="collapse" data-parent="#accordion1" href="#comp">Compliance Lists<span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul id="comp" class="collapse">
	                    <li><a href="#">Inspection Report</a></li>
	                    <li><a href="#">Provisional Assessment form</a></li>
	                    <li><a href="#">Final Assessment</a></li>
               		</ul>
				</li>
				<li><a href="{{ url('/dashboard/settings')}}">Settings<span class="glyphicon glyphicon-cog"></span></a></li>
				@if(\Auth::check())
				<li><a href="{{ url('/logout')}}">Logout<span class="glyphicon glyphicon-off"></span></a></li>
				@else
				<li>{!! Html::linkRoute('login', 'Login') !!}</li>
				@endif
				<li>

				</li>
			</ul>
		</div>