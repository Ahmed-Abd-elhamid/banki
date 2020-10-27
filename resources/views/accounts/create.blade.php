@extends('layouts.app')

@section('css')
<link href="{{ asset('css/transactions/create.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row justify-content-center shadow rounded">
	<div class="col-12 text-center p-1">
		<div class="header">
			<h2 class="animation a1">Create New Account Now!</h2>
			<h4 class="animation a2">Easy Way to track all transactions all of the day!</h4>
		</div>
	</div>
</div>
<hr>
<div class="row justify-content-center shadow rounded">
	<div class="col-md-6 col-sm-12 border rounded p-3">
		<div class="left">
			<form class="p-5" method="POST" action="{{route('accounts.store')}}" enctype="multipart/form-data"
				onsubmit="return confirm('Are you sure about creating New account?');">
				@csrf
				<div class="form-group">
					<label for="exampleInputEmail1">Account Type</label>
					<select class="form-control" name="type" id="type" required>
						{{-- <option selected disabled readonly>Account Type</option> --}}
						<option value="current">Current</option>
						<option value="saving">Saving</option>
						<option value="credit">Credit</option>
						<option value="joint">Joint</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Account Bank</label>
					<select class="form-control" name="bank" id="bank" required>
						{{-- <option selected disabled readonly>Account Bank</option> --}}
						{{-- <option value="200">test</option> --}}
						@foreach($banks as $bank)
							<option value="{{ $bank->id }}">{{ $bank->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Balance</label>
				<input type="number" class="form-control" name="balance" id="balance" minlength="1" maxlength="40" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Account Currency</label>
					<select class="form-control" name="currency" id="currency" required>
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
				<button type="submit" class="btn btn-primary mt-2">Create</button>
			</form>
		</div>
	</div>
	<div class="col-md-6 col-sm-12 border rounded p-3">
		<div class="right"></div>
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/accounts/create.js') }}"></script>
@endsection