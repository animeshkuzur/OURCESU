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

		<div id="page-content-wrapper">
			<div class="container-fluid db-title">
				<div class="row">
					<div class="col-md-12">
						<h2 style="color: #d5d5d5;">Dashboard / Compilance List / Inspection Report</h2>
						<hr class="db-hr">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="details bill">
							@include('bills.inspection-report')
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<script>


		$("#menu-toggle").click( function(e){
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});

		</script>
@endsection	