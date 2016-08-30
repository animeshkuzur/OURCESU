@extends('layout.master')

@section('style')
	<link rel="stylesheet" href="{{ URL::asset('style/spot-bills.css') }}">
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
						<h2 style="color: #d5d5d5;">Dashboard / Billing / Spot Bills</h2>
						<hr class="db-hr">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3 col-sm-push-9">
						<div class="details float">
							<ul class="nav nav-tabs ">
							  <li role="presentation" class="active"><a href="#">Date View</a></li>
							  <li role="presentation"><a href="{{ url('/dashboard/listspotbill') }}">List View</a></li>
							</ul>
							<br>
							{!! Form::open(array('route' => 'getspotbills', 'method'=>'POST')) !!}
							<div class="row">
								<div class="form-group">
									<label for="date" class="col-sm-4 control-label">Date:</label>
									<div class="col-sm-8">
										{!! Form::select('date', $item2, null,array('class' => 'form-control','id'=>'year','title'=>'Select Date','active')); !!}
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-12">
										{!! Form::submit('GET BILL',array('class' => 'btn btn-primary btn-block','name'=>'submit')) !!}
									</div>
								</div>
							</div>
							{!! Form::close() !!}
							<p><hr></p>
							<div class="row">
								<div class="col-md-12">
									<a class="btn btn-danger btn-block disabled" href="#" role="button">DOWNLOAD</a>	
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-9 col-sm-pull-3">
						<div class="details bill">
						@if(isset($data))
							@foreach($data as $dat)
							@endforeach
							@include('bills.spot-bill')
						@endif
						@if(isset($lstdata))
							<div class="table-responsive">
								<table class="table table-striped">
								    <thead>
								      <tr style="font-size: 14px;">
								      	<th>Bill Month</th>
								      	<th>Units Billed</th>
								      	<th>Amount</th>
								      	<th>View</th>
								      </tr>
								    </thead>
									<tbody>
									@foreach($lstdata as $lst)
										<tr style="font-size: 14px;">
										    <td>{{ substr($lst->BillMonth,0,4)."-".substr($lst->BillMonth,4,5) }}</td>
										    <td>{{ $lst->UNITS_BILLED }}</td>
										    <td>{{ $lst->CUR_BILL }}</td>
										    {!! Form::open(array('route' => 'getspotbills', 'method'=>'POST')) !!}
										    <input type="hidden" name="date" value="{{ $lst->BillMonth }}"></input>
										    <td>{!! Form::submit('GET BILL',array('class' => 'btn btn-sm btn-default btn-block','name'=>'submit')) !!}</td>
										    {!! Form::close() !!}
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						@endif
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

	</script>

@endsection