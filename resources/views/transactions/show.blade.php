@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="row justify-content-center m-3 p-1 rounded shadow border">
	<div class="col-10 p-3 text-center border-right">
		<h2>welcome {{ $transaction->account->user->name }} to your transaction</h2>
	</div>
	<div class="col-2 p-3 text-center">
		<a class="btn btn-danger rounded shadow mt-1">Delete Trans</a>
	</div>
</div>
<div class="row justify-content-center m-3 p-1 rounded shadow border">
	<div class="col-10 m-3">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col" colspan="2">Transaction Num</th>
					<th scope="col">Type</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">{{ $transaction->id }}</th>
					<td colspan="2">{{ $transaction->transaction_num }}</td>
					<td>{{ $transaction->type }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-10 m-3">
		<table class="table table-hover">
			@if( $transaction->type == 'transfer')
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Type</th>
					<th scope="col">Balance</th>
					<th scope="col" colspan="2">Account</th>
				</tr>
			</thead>
			<tbody>
				@foreach($transaction->transactions as $trans)
				<tr>
						<th scope="row">{{ $trans->id }}</th>
						<td>{{ $transaction->type }}</td>
						<td class="text-success">+ {{ $trans->balance }}</td>
						<td colspan="2"><strong>To:</strong> {{ $trans->account->account_num }}</td>
				</tr>
				@endforeach
			</tbody>
			@elseif($transaction->type == 'deposite_withdraw')
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Type</th>
					<th scope="col">Balance</th>
					<th scope="col" colspan="2">Account</th>
				</tr>
			</thead>
			<tbody>
				@foreach($transaction->transactions as $trans)
				<tr>
						<th scope="row">{{ $trans->id }}</th>
						<td>{{ $trans->type }}</td>
						@if($trans->type == 'deposite')
						<td class="text-success">+ {{ $trans->balance }}</td>
						<td colspan="2"><strong>To:</strong> {{ $trans->account->account_num }}</td>
						@else
						<td class="text-danger">- {{ $trans->balance }}</td>
						<td colspan="2">From {{ $trans->account->account_num }}</td>
						@endif
				</tr>
				@endforeach
			</tbody>
			@endif
		</table>
	</div>

</div>
@endsection

@section('js')

@endsection