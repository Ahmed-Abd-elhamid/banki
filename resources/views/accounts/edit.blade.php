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
			<form class="p-5" method="POST" action="{{route('accounts.update', $account)}}" enctype="multipart/form-data"
				onsubmit="return confirm('Are you sure about Editing this account?');">
				@csrf
				{{method_field('PUT')}}
				<div class="form-group">
					<label for="exampleInputEmail1">Account Type</label>
					<select class="form-control" name="type" id="type" required>
						<option value="{{$account->type}}" selected>{{ ucfirst($account->type) }}</option>
						@if($account->type != 'current')
							<option value="current">Current</option>
						@endif
						@if($account->type != 'saving')
							<option value="saving">Saving</option>
						@endif
						@if($account->type != 'credit')
							<option value="credit">Credit</option>
						@endif
						@if($account->type != 'joint')
							<option value="joint">Joint</option>
						@endif
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Account Bank</label>
					<select class="form-control" name="bank" id="bank" required>
						{{-- <option selected disabled readonly>Account Bank</option> --}}
						@foreach($banks as $bank)
							@if($account->bank_id != $bank->id)
								<option value="{{ $bank->id }}">{{ $bank->name }}</option>
							@else
								<option value="{{ $bank->id }}" selected>{{ $bank->name }}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Account Currency</label>
					<select class="form-control" name="currency" id="currency" required>
						{{-- <option selected disabled readonly>Account Currency</option> --}}
						<option value="{{$account->currency}}" selected>{{ $account->currency }}</option>
						@if($account->currency != 'USD')
							<option value="USD">USD</option>
						@endif
						@if($account->currency != 'EURO')
							<option value="EURO">EURO</option>
						@endif
						@if($account->currency != 'EGP')
							<option value="EGP">EGP</option>
						@endif
						@if($account->currency != 'SAR')
							<option value="SAR">SAR</option>
						@endif
						@if($account->currency != 'YEN')
							<option value="YEN">YEN</option>
						@endif
					</select>
				</div>
				<button type="submit" class="btn btn-warning text-dark mt-2">Edit</button>
			</form>
		</div>
	</div>
	<div class="col-md-6 col-sm-12 border rounded p-3">
		<div class="right"></div>
	</div>
</div>
@endsection

@section('js')

@endsection