@extends('layouts.app')

@section('css')
<link href="{{ asset('css/banks/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row justify-content-center shadow rounded">
	<div class="col-12 text-center p-1 border-right">
		<div class="header">
			<h2 class="animation a1">Welcome Back</h2>
			<h4 class="animation a2">Log in to your account using email and password</h4>
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
				<th scope="col">Balacne</th>
				<th scope="col">From Account</th>
				<th scope="col">More..</th>
			  </tr>
			</thead>
			<tbody>
				@foreach($transactions as $transaction)
				<tr>
					<td>{{ $transaction->id }}</td>
					<td colspan="2">{{ $transaction->transaction_num }}</td>
					<td>{{ $transaction->type }}</td>
					<td>{{ $transaction->balance }}</td>
					<td>{{ $transaction->account->account_num }}</td>
					<td><a class="btn btn-sm btn-primary" href="{{ route('transactions.show', $transaction->transaction_num) }}">Show Details</a>
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