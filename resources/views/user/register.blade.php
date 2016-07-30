@extends('layout.master')
@section('style')
	<link rel="stylesheet" href="{{ URL::asset('style/register.css') }}">
@endsection
@section('header')
	@include('include.header')
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
				{!! Form::open(array('route' => 'user.store','method'=>'POST')) !!}
					<div class="row">
						<div class="col-md-6">
							{!! Form::text('name', null, array('class' => 'form-control','placeholder'=>'First Name')) !!}
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
							{!! Form::password('password', array('class' => 'form-control','placeholder'=>'Password')) !!}
						</div>
						<div class="col-md-6">
							{!! Form::password('password_confirmation', array('class' => 'form-control','placeholder'=>'Confirm Password')) !!}
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6" id="cont_acc1">
							
							<input class="form-control" placeholder="CONTRACT ACCOUNT NUMBER" name="CONT_ACC[]" type="text">
						</div>
						<div class="col-md-6">
							{!! Form::text('phone', null, array('class' => 'form-control','placeholder'=>'Mobile No.')) !!}
						</div>
					</div>
					<br>
					<div id="cont_acc">
						
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<button type="button" id="addBtn" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;CONTRACT ACC</button>

							<button type="button" id="removeBtn" class="btn btn-default"><span class="glyphicon glyphicon-minus"></span>&nbsp;&nbsp;REMOVE CONTRACT ACC</button>
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
						<div class="col-sm-12">Developed by <a href="http://tnine.io" target="_blank">TNine Infotech</a></div>
						</div>
					</div>	
			</div>
		</div>
		<div class="col-md-2 content">
			
		</div>

		<script type="text/javascript">

			$(document).ready(function(){

			    var counter = 2;
					
			    $("#addBtn").click(function () {
							
				if(counter>10){
			            alert("Only 10 textboxes allow");
			            return false;
				}   
					
				var newTextBoxDiv = $(document.createElement('div'))
				     .attr({id : 'cont_acc' + counter,
				 			class: "row"});
			                
				newTextBoxDiv.after().html('<div class="col-md-6"><input class="form-control" placeholder="CONTRACT ACCOUNT NUMBER '+counter+'" name="CONT_ACC[]" type="text"></div>');
			            
				newTextBoxDiv.appendTo("#cont_acc");

							
				counter++;
			    });

			     $("#removeBtn").click(function () {
				if(counter==2){
			          alert("No more textbox to remove");
			          return false;
			       }   
			        
				counter--;
						
			        $("#cont_acc" + counter).remove();
						
			    });
					

			});
		</script>
@endsection