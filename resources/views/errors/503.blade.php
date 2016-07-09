@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('style/503.css') }}">
@endsection
@section('header')
	@include('include.header')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Oops! Something seems unplugged!</h1>
                <h3>Please check the url or try logging in.</h3>
            </div>
        </div>
    </div>

@endsection