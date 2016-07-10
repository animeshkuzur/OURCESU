@extends('layout.master')

@section('style')
	<link rel="stylesheet" href="{{ URL::asset('style/login.css') }}">
@endsection
@section('header')
	@include('include.header')
@endsection
@section('content')
		<!----------Content---------->
		<div class="container">
		<div class="row">
			<div class="col-md-8 content">
				
			</div>

			<!----------login Panel---------->
			<div class="col-md-4">
			<div class="login-panel">
				<h3>Login</h3>
				<hr>
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
				{!! Form::open(array('route' => 'loginvalidate','method'=>'POST')) !!}
					{!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'Email')) !!}
					<br>
					{!! Form::password('password', array('class' => 'form-control','placeholder'=>'Password')) !!}	
					<div class="checkbox">
  						<label>{!! Form::checkbox('remember','remember', array('name'=>'remember','tabindex'=>'4')) !!}Remember Me</label>
  						<br>
					</div>
					{!! Form::submit('LOGIN', array('class' => 'btn btn-primary btn-block','name'=>'login')) !!}
					<br>
					<label>{!! Html::linkRoute('forgot', 'Forgot your password?') !!}</label>
					<br>
					<br>
					<div class="or">
						<h4><span>OR</span></h4>
					</div>
					<!--<a class="btn btn-danger btn-block" href="/register" role="button">SIGN UP</a>-->
					{!! Html::linkRoute('user.create', 'SIGN UP', array(), array('class' => 'btn btn-danger btn-block','role'=>'button')) !!}
					<br><br>
					<div class="row">
						<div class="foot">
						<div class="col-sm-12">Developed by <a href="http://tnine.io" target="_blank">TNine Infotech</a></div>
						</div>
					</div>
				{!! Form::close() !!}			
			</div>
			</div>
		</div>
		</div>
@endsection