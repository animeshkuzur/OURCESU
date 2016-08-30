<script type="text/javascript">
	$(document).ready(function(){
		if($(window).width()<=768){
			$("#full-src").remove();			
		}
		else{
			$("#mob-src").remove();
		}

	});


	/*$(window).resize(function() { 	
  		if($(window).width()<=768){
  			$("#full-src").remove();
  		}
  		else{
  			$("#shortcuts").append('<div class="pull-right" id="full-src">Hello</div>');
  		}
	});*/
</script>
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
					
					<div id="shortcuts">

					<div id="mob-src" class="pull-right">
						<div class="col-xs-3">
						<div class="dropdown">
						  <a class="dropdown-toggle" type="button" data-toggle="dropdown">
						  <span class="glyphicon glyphicon-triangle-bottom" style="font-size: 25px;color: #3a3a3c;margin-top: 30px;" ></span></a>
						  <ul class="dropdown-menu dropdown-menu-right" role="menu">
						    <li><a href="{{ url('/select-acc')}}" type="button" title="Switch Accounts">
								<span class="glyphicon glyphicon-refresh" style="font-size: 18px;color: #3a3a3c;margin-top: 5px; "></span>
								Switch Accounts</a></li>
						    <li><a href="{{ url('/dashboard/settings')}}" type="button" title="Settings">
								<span class="glyphicon glyphicon-cog" style="font-size: 18px;color: #3a3a3c;margin-top: 5px; "></span>
								Settings</a></li>
						    <li>@if(\Auth::check())
								<a href="{{ url('/logout')}}" type="button" title="Logout">
								<span class="glyphicon glyphicon-off" style="font-size: 18px;color: #3a3a3c;margin-top: 5px; "></span>
								Logout</a>
							@else
								{!! Html::linkRoute('login', 'Login') !!}
							@endif</li>
						  </ul>
						</div>
						</div>
						<div class="col-xs-3"></div>

					</div>

					<div class="pull-right" id="full-src">

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
		</div>