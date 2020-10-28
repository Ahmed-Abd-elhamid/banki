@extends('layouts.app')

@section('css')
<link href="{{ asset('css/banks/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row justify-content-center shadow rounded">
	<div class="col-lg-6 col-sm-12 text-center p-1 border-right">
		<div class="header">
			<h2 class="animation a1">Welcome Back</h2>
			<h5 class="animation a2">Your transactions</h5>
		</div>
	</div>
	<div class="col-lg-3 col-sm-5 text-center p-3 mt-3">
		<div class="header">
			<a class="btn btn-success rounded shadow" href="{{ route('transactions_type.create', 'transfer') }}">Transfer</a>
		</div>
	</div>
	<div class="col-lg-3 col-sm-5 text-center p-3 mt-3">
		<div class="header">
			<a class="btn btn-success rounded shadow"
				href="{{ route('transactions_type.create', 'deposite_withdraw') }}">deposite_withdraw</a>
		</div>
	</div>
</div>
<hr>
<div class="row justify-content-center shadow rounded">
	<div class="col-10 p-2">
		<p>Filter By: <a class="btn btn-sm shadow rounded ml-2 mr-2 hvr-sink" href="{{ route('transactions.index', ['date'=>'hour']) }}">Last Hour</a><a class="btn btn-sm shadow rounded ml-2 mr-2 hvr-sink" href="{{ route('transactions.index', ['date'=>'day']) }}">Last Day</a><a class="btn btn-sm shadow rounded mr-2 hvr-sink" href="{{ route('transactions.index', ['date'=>'week']) }}">Last Week</a><a class="btn btn-sm shadow rounded mr-2 hvr-sink" href="{{ route('transactions.index', ['date'=>'month']) }}">Last Month</a><a class="btn btn-sm shadow rounded hvr-sink" href="{{ route('transactions.index', ['date'=>'year']) }}">Last Year</a></p>
	</div>
	<div class="col-10 p-3">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr class="text-center">
						<th scope="col">#</th>
						<th scope="col" colspan="2">Transaction Num</th>
						<th scope="col">Type</th>
						<th scope="col">Balacne</th>
						<th scope="col" colspan="2">Account Number</th>
						<th scope="col">More..</th>
					</tr>
				</thead>
				<tbody>
					@foreach($transactions as $transaction)
					@php
						$current_transactions = $transaction->transaction_num;
					@endphp
					<tr class="{{ $transaction->type == 'transfer' ? 'alert-warning':''}}{{ $transaction->type == 'deposite' ? 'alert-success':''}}{{ $transaction->type == 'withdraw' ? 'alert-danger':''}}">
						<td>{{ $transaction->id }}</td>
						<td colspan="2">{{ $transaction->transaction_num }}</td>
						<td
							class="{{ $transaction->type == 'transfer' ? 'text-dark':''}}{{ $transaction->type == 'deposite' ? 'text-success':''}}{{ $transaction->type == 'withdraw' ? 'text-danger':''}}">
							<strong>{{ ucfirst($transaction->type) }}</strong></td>
						@if ($transaction->type == 'deposite')
						<td class="text-success"><strong>+</strong>{{ $transaction->balance }}</td>
						@else
						<td class="text-danger"><strong>-</strong>{{ $transaction->balance }}</td>
						@endif
				<td colspan="2">{{ $transaction->account->account_num }}{{$transaction->type == 'transfer' ? " >> ".$transaction->to_account->account_num:''}}</td>
						<td><a class="btn btn-sm btn-primary"
								href="{{ route('transactions.show', $transaction) }}">Show Details</a>
						</td>
					</tr>
					@php
						$previous_transactions = $transaction->transaction_num;
					@endphp
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection