@extends('layouts.app')

@section('css')
<link href="{{ asset('css/banks/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row justify-content-center shadow rounded">
	<div class="col-10 text-center p-1 border-right">
		<div class="header">
			<h2 class="animation a1">Welcome Back</h2>
			<h4 class="animation a2">Log in to your account using email and password</h4>
		</div>
	</div>
	<div class="col-2 text-center p-4">
		<div class="header">
			<a class="btn btn-success rounded shadow" href="{{ route('transactions.create') }}">New Transaction</a>
		</div>
	</div>
</div>
<hr>
<div class="row justify-content-center shadow rounded">
	<div class="col-10 p-3">
		<table class="table table-hover">
			<thead>
			  <tr>
				<th scope="col">#</th>
				<th scope="col" colspan="2">Transaction Num</th>
				<th scope="col">Type</th>
				<th scope="col">Money In</th>
				<th scope="col">Money Out</th>
				<th scope="col" colspan="2">Transfered from</th>
				<th scope="col">More..</th>
			  </tr>
			</thead>
			<tbody>
				@foreach($transactions as $transaction)
				<tr>
				<th scope="row">{{ $transaction->id }}</th>
					<td colspan="2">{{ $transaction->transaction_num }}</td>
					<td>{{ $transaction->type }}</td>
					<td class="text-success">+ {{ $transaction->money_in }}</td>
					<td class="text-danger">- {{ $transaction->money_out }}</td>
					<td colspan="2">{{ $transaction->transfer_from }}</td>
					<td><a class="btn btn-sm btn-primary" href="{{ route('transactions.show', $transaction->id) }}">Show Details</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		  </table>
	</div>
</div>
@endsection

@section('js')

@endsection