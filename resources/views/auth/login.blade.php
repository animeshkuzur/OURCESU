@extends('layout.master')

@section('content')

		<!----------Content---------->
		<div class="container">
		<div class="row">
			<div class="col-md-8 content">
				<!--<h1>&nbsp;Managing your Electricity Bill...</h1>
				<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...have never been this easy!</h1>-->
			</div>

			<!----------login Panel---------->
			<div class="col-md-4">
			<div class="login-panel">
				<h3>Login</h3>
				<hr>
				{!! Form::open(array('route' => 'loginvalidate','method'=>'POST')) !!}
					{!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'Username')) !!}
					<br>
					{!! Form::password('password', array('class' => 'form-control','placeholder'=>'Username')) !!}	
					<div class="checkbox">
  						<label><input type="checkbox" value="">Remember Me</label>
  						<br>
					</div>
					{!! Form::submit(null, array('class' => 'btn btn-primary btn-block','value'=>'LOGIN')) !!}
					<br>
					<label><a href="">Forgot your password?</a></label>
					<br>
					<br>
					<div class="or">
						<h4><span>OR</span></h4>
					</div>
					<button class="btn btn-danger btn-block">SIGN UP</button>
					<br><br>
					<div class="row">
						<div class="foot">
						<div class="col-sm-12">Developed by <a href="#" target="_blank">TNine Infotech</a></div>
						</div>
					</div>
				{!! Form::close() !!}			
			</div>
			</div>
		</div>
		</div>
@endsection