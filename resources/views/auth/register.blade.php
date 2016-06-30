@extends('layout.master')
@section('style')
	<link rel="stylesheet" href="{{ URL::asset('style/register.css') }}">
@endsection
@section('content')
	<!----------Content---------->
	<div class="container">
	<div class="row">
		<div class="col-md-2 content">
			
		</div>
		<div class="col-md-8 content">
			<div class="register-panel">
				<h3>Register</h3>
				<hr>
				{!! Form::open(array('route' => 'registervalidate','method'=>'POST')) !!}
					<div class="row">
						<div class="col-md-6">
							{!! Form::text('fname', null, array('class' => 'form-control','placeholder'=>'First Name')) !!}
						</div>
						<div class="col-md-6">
							{!! Form::text('lname', null, array('class' => 'form-control','placeholder'=>'Last Name')) !!}
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							{!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'Email ID')) !!}
						</div>
					</div>
					<br>					
					<div class="row">
						<div class="col-md-6">
							{!! Form::password('password1', array('class' => 'form-control','placeholder'=>'Password')) !!}
						</div>
						<div class="col-md-6">
							{!! Form::password('password2', array('class' => 'form-control','placeholder'=>'Confirm Password')) !!}
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
							{!! Form::text('cont_acc', null, array('class' => 'form-control','placeholder'=>'CONTRACT ACCOUNT NUMBER')) !!}
						</div>
						<div class="col-md-6">
						</div>
					</div>
					<br><br>
					<div class="row">
						<div class="col-md-6">
							{!! Form::submit(null, array('class' => 'btn btn-primary btn-block','value'=>'LOGIN')) !!}
						</div>
						<div class="col-md-6">
							
						</div>
					</div>
				{!! Form::close() !!}
				<br><br>
				<div class="row">
						<div class="foot">
						<div class="col-sm-12">Developed by <a href="#" target="_blank">TNine Infotech</a></div>
						</div>
					</div>	
			</div>
		</div>
		<div class="col-md-2 content">
			
		</div>
@endsection