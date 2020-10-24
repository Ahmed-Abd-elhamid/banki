@extends('layouts.app')

@section('css')
<link href="{{ asset('css/transactions/create.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row justify-content-center shadow rounded">
	<div class="col-12 text-center p-1">
		<div class="header">
			<h2 class="animation a1">Welcome Back</h2>
			<h4 class="animation a2">Log in to your account using email and password</h4>
		</div>
	</div>
</div>
<hr>
<div class="row justify-content-center shadow rounded">
	<div class="col-md-4 col-sm-12 border rounded p-3">
		<div>
			<h2 class="shadow-lg rounded text-center text-white bg-darkblue p-2 mb-3">Add Transaction</h2>
			<div class="form-group">
				<label for="exampleInputEmail1">From Account</label>
				<select class="form-control account_from" name="from_account" id="from_account" required autocomplete="on">
					@foreach($user_accounts as $user_account)
					<option value="{{ $user_account->account_num }}">{{ $user_account->account_num }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">To Account</label>
				<select class="form-control account_from" name="to_account" id="to_account" required autocomplete="on">
					@foreach($account_numbers as $account_num)
					<option value="{{ $account_num->account_num }}">{{ $account_num->account_num }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Transaction Type</label>
				<select class="form-control" name="type" id="type" required>
					<option value="transfer" selected disabled readonly>Transfer</option>
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Balance</label>
				<input type="number" class="form-control" name="balance" id="balance" required min="50" max="10000000"
					minlength="1" maxlength="10">
			</div>
		</div>
		<hr>
		<div class="justify-content-center text-center mt-5">
			<button id="add-transaction" class="btn btn-warning shadow-lg hvr-forward">Add >></button>
		</div>
	</div>
	<div class="col-md-8 col-sm-12 border rounded p-3">
		<div class="d-none" id="actions-buttons">
			<form id="transaction" method="POST" action="{{route('transfer_transactions.store')}}"
				enctype="multipart/form-data" class="form-horizontal" role="form">
				@csrf
				<div class="justify-content-center">
					<h2 class="shadow rounded text-center text-white bg-darkblue mb-3 p-2">
						Transactions</h2>
				</div>
				<div id="order-transaction" class="p-2 border border-dark rounded">
					<br>
					<table class="table table-sm text-center p-auto">
						<thead class="thead-dark">
							<tr>
								<th colspan="2">From</th>
								<th colspan="2">To</th>
								<th>Type</th>
								<th>Balance</th>
							</tr>
						</thead>
						<tbody id="tbody">

						</tbody>
					</table>
					<input type="number" class="d-none" name="items" value="0" id="items" readonly hidden>
					<div class="justify-content-center mt-5 mb-2">
						<input id="rm-transaction"
							class="shadow btn border border-danger text-center p-1 rounded hvr-float" value="Undo">
						<input id="rs-transaction"
							class="shadow btn border border-danger text-center p-1 rounded ml-1 hvr-float"
							value="Reset">
					</div>
				</div>
				<div class="justify-content-center mt-5">
					<button class="btn btn-primary btn-lg shadow-lg disabled border border-dark rounded hvr-grow-shadow"
						id="addin" type="submit"><b>Set
							Transactions</b></button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/transactions/transfer/create.js') }}" defer></script>
@endsection