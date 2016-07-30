@extends('layout.master')

@section('style')
	<link rel="stylesheet" href="{{ URL::asset('style/settings.css') }}">
@endsection
@section('header')
	@include('include.dashboardheader')
@endsection
@section('content')
	<div id="wrapper">
		
		@include('include.sidebar');

		<!------Content------>
		<div id="page-content-wrapper">
			<div class="container-fluid db-title">
				<div class="row">
					<div class="col-md-12">
						<h2 style="color: #d5d5d5;">Dashboard / Settings</h2>
						<hr class="db-hr">
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-12">
					@if($errors)
						@if(count($errors))
							@foreach($errors->all() as $error)	
								<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									{{ $error }}
								</div>
							@endforeach				
						@endif
					@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="details">
							<h4>User Account Details</h4>
							<hr>
							
							{!! Form::open(array('route' => 'savesettings', 'method'=>'POST')) !!}
							<div class="row">
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-10">
										{!! Form::text('name',\Auth::user()->name, array('class' => 'form-control','placeholder'=>'First Name','id'=>'name')) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="email" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										{!! Form::text('email',\Auth::user()->email, array('class' => 'form-control','placeholder'=>'Email','id'=>'email','disabled'=>'disabled')) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Phone</label>
									<div class="col-sm-10">
										{!! Form::text('phone',\Auth::user()->phone, array('class' => 'form-control','placeholder'=>'Mobile No.','id'=>'phone')) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-10"></div>
									<div class="col-sm-2">
										{!! Form::submit('SAVE',array('class' => 'btn btn-primary btn-block','name'=>'submit','disabled'=>'disabled')) !!}
									</div>
								</div>
							</div>
							{!! Form::close() !!}
						</div>
					</div>

					<div class="col-md-4">
						<div class="details">
							@foreach($data as $dat)
							@endforeach
							<div class="row">
								<div class="col-xs-7">
									Contract Account No.:
								</div>
								<div class="col-xs-5">
									<strong>{{ $dat->CONTRACT_ACC }}</strong>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-7">
									Consumer Account No.:
								</div>
								<div class="col-xs-5">
									<strong>{{ $dat->CONS_ACC }}</strong>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-7">
									Division Code:
								</div>
								<div class="col-xs-5">
									<strong>{{ $dat->DivCode }}</strong>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-7">
									Division:
								</div>
								<div class="col-xs-5">
									<strong>{{ $dat->DIVISION }}</strong>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-7">
									Meter No.:
								</div>
								<div class="col-xs-5">
									<strong>{{ $dat->METER_NO }}</strong>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="details">
							<h4>Change Password</h4>
							<hr><br>
							{!! Form::open(array('route' => 'changepassword', 'method'=>'POST')) !!}
							<div class="row">
								<div class="col-md-4">
									{!! Form::password('password1', array('class' => 'form-control','placeholder'=>'Current Password')) !!}
								</div>
								<div class="col-md-4">
									{!! Form::password('password2', array('class' => 'form-control','placeholder'=>'New Password')) !!}
								</div>
								<div class="col-md-4">
									{!! Form::password('password3', array('class' => 'form-control','placeholder'=>'Confirm New Password')) !!}
								</div>
							</div><br>
							<div class="row">
								<div class="col-md-10"></div>
								<div class="col-md-2">
									{!! Form::submit('CHANGE', array('class' => 'btn btn-primary btn-block','name'=>'submit2')) !!}
								</div>
							</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="details">
							<h4>Switch Contract Account</h4>
							<hr><br>
							<div class="row">
								<div class="col-md-12">
									<a href="{{url('/select-acc')}}" class="btn btn-primary btn-block btn-lg"><span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;SWITCH</a>		
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-md-8">
						<div class="details">
							<h4>Add Contract Account Number</h4>
							<hr><br>
							<div class="row">
							{!! Form::open(array('route' => 'addcontacc', 'method'=>'POST')) !!}
								<div class="col-md-10">
									{!! Form::text('CONT_ACC',NULL, array('class' => 'form-control','placeholder'=>'CONTRACT ACCOUNT NUMBER','id'=>'CONT_ACC')) !!}
								</div>
								<div class="col-md-2">
									{!! Form::submit('ADD', array('class' => 'btn btn-primary btn-block','name'=>'submit3')) !!}
								</div>
							{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!----Menu Toggle Script and Graph---->
	<script>

		$("#menu-toggle").click( function(e){
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});

		$('input[name="name"]').change(function(e){
			e.preventDefault();
    			$("input[name='submit']").removeAttr('disabled');
		});
		$('input[name="phone"]').change(function(e){
			e.preventDefault();
    			$("input[name='submit']").removeAttr('disabled');
		});

	</script>
@endsection