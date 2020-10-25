@extends('layouts.app')

@section('css')
<link href="{{ asset('css/transactions/create.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row justify-content-center shadow rounded">
	<div class="col-12 text-center p-1">
		<div class="header">
			<h2 class="animation a1">Currency Converter</h2>
		</div>
	</div>
</div>
<hr>
<div class="row justify-content-center shadow rounded">
	<div class="col-md-7 col-sm-12 border rounded p-3">
		<div class="left">
			@if(empty($from) && empty($to))
			<form class="p-5" method="GET" action="{{route('transactions.convert')}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="exampleInputEmail1">From Currency</label>
					<select class="form-control" name="from_currency" id="from_currency" required>
						{{-- <option selected disabled readonly>Account Currency</option> --}}
						<option value="EGP">EGP</option>
						<option value="USD">USD</option>
						<option value="EUR">EUR</option>
						<option value="SAR">SAR</option>
						<option value="GBP">GBP</option>
						<option value="CAD">CAD</option>
						<option value="JPY">JPY</option>
						<option value="AUD">AUD</option>
						<option value="AUD">AED</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">To Currency</label>
					<select class="form-control" name="to_currency" id="to_currency" required>
						{{-- <option selected disabled readonly>Account Currency</option> --}}
						<option value="EGP">EGP</option>
						<option value="USD">USD</option>
						<option value="EUR">EUR</option>
						<option value="SAR">SAR</option>
						<option value="GBP">GBP</option>
						<option value="CAD">CAD</option>
						<option value="JPY">JPY</option>
						<option value="AUD">AUD</option>
						<option value="AUD">AED</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Ammount</label>
				<input type="number" class="form-control" name="ammount" id="ammount" required value="{{$ammount}}">
				</div>
				<button type="submit" class="btn btn-success shadow rounded mt-2">Converter</button>
			</form>
			@else
			<div class="p-5 m-3 rounded shadow border">
				<h2>From <strong> {{ $ammount }}</strong> {{ $from }}</h2>
			</div>
			<div class="p-5 m-3 rounded shadow border">
				<h2>To <strong> {{ number_format($result, 2, ',', ' ') }}</strong> {{ $to }}</h2>
			</div>
			<div class="p-3 m-3 rounded shadow border">
				<h6>Another Convertion? <a href="{{ route('transactions.convert') }}">Convert</a></h6> 
			</div>
			@endif
		</div>
	</div>
	<div class="col-md-5 col-sm-12 border rounded p-3">
		<div class="right"></div>
	</div>
</div>
@endsection

@section('js')

@endsection