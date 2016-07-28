@extends('layout.master')

@section('style')
	<link rel="stylesheet" href="{{ URL::asset('style/select-acc.css') }}">
@endsection
@section('header')
	@include('include.header')
@endsection
@section('content')
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<h3>Choose a connection</h3>
				<hr>
			</div>
		</div>
		<br>
		<div class="row">
		
		@foreach($data as $dat)
		<div class="col-md-3">
		<div class="tabs">
			<div class="row">
				<div class="col-md-12">
					<span class="glyphicon glyphicon-scale" style="font-size: 50px;"></span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					CONTRACT ACCOUNT NO: <b>{{ $dat->CONTRACT_ACC }}</b>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					CONSUMER ACCOUNT NO: <b>{{ $dat->CONSUMER_ACC }}</b>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					METER NO: <b>{{ $dat->METER_NO }}</b>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					{!! Form::open(array('route' => 'selected-acc','method'=>'POST')) !!}
						{!! Form::hidden('CONT_ACC',$dat->CONTRACT_ACC) !!}
						{!! Form::submit('SELECT', array('class' => 'btn btn-primary btn-block')) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		</div>
		@endforeach
		
		</div>
	</div>
@endsection