<div class="header">
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="row">

					<div class="col-xs-1">
						<a href="#menu-toggle" class="" id="menu-toggle" type="button" style="margin-top: 25px;">
                			<span class="glyphicon glyphicon-menu-hamburger"></span>
              			</a>

					</div>
					<div class="col-xs-4">
						<div class="navbar-brand">
							<img src="{{ URL::asset('images/logo.png') }}">
						</div>
					</div>
					
					<div class="pull-right">
						
							<div class="col-xs-3">
								<a href="{{ url('/select-acc')}}" type="button" title="Switch Accounts">
								<span class="glyphicon glyphicon-refresh" style="font-size: 25px;color: #3a3a3c;margin-top: 30px; "></span>
								</a>	
							</div>	

							<div class="col-xs-3">
								<a href="{{ url('/dashboard/settings')}}" type="button" title="Settings">
								<span class="glyphicon glyphicon-cog" style="font-size: 25px;color: #3a3a3c;margin-top: 30px; "></span>
								</a>	
							</div>
						
							<div class="col-xs-3">
							@if(\Auth::check())
								<a href="{{ url('/logout')}}" type="button" title="Logout">
								<span class="glyphicon glyphicon-off" style="font-size: 25px;color: #3a3a3c;margin-top: 30px; "></span>
								</a>
							@else
								<li>{!! Html::linkRoute('login', 'Login') !!}</li>
							@endif	
							</div>

							<div class="col-xs-3">
								<span style="margin-top: 30px; "></span>
							</div>
							
					</div>
					
					
				</div>
			</div>
		</div>