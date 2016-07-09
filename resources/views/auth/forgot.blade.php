@extends('layout.master')

@section('style')
	<link rel="stylesheet" href="{{ URL::asset('style/forgot.css') }}">
@endsection
@section('header')
	@include('include.header')
@endsection
@section('content')
<div clas="container">
	<div class="container">
		<div class="col-md-7 content">
			
		</div>
		<div class="col-md-5">
			<div class="panel">
				<h3>Enter your registered email.</h3>
				<hr>
				{!! Form::open(array('route' => 'handleforgot','method'=>'POST')) !!}
					{!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'Email')) !!}
					<br><br>
					{!! Form::submit(null, array('class' => 'btn btn-primary btn-block','value'=>'LOGIN')) !!}
				{!! Form::close() !!}	
			</div>
		</div>
	</div>
</div>
@endsection