@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="row justify-content-center m-3 p-1 rounded shadow border">
	<div class="col-10 p-3 text-center border-right">
		<h2>Transaction Number: {{$transaction_sample->transaction_num}}</h2>
	</div>
	@if($transaction_sample->can_delete())
	<div class="col-2 p-3 text-center">
		<form method="POST" action="{{route('transactions.destroy', $transaction_sample->transaction_num)}}"
			enctype="multipart/form-data"
			onsubmit="return confirm('Do you want to change the account activation mode?');">
			@csrf
			{{method_field('DELETE')}}
			<button type="submit" class="btn btn-danger hvr-skew">Delete</button>
		</form>
	</div>
	@endif
</div>
<div class="row justify-content-center m-3 p-1 rounded shadow border">
	<div class="col-10 m-3">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col" colspan="2">Transaction Num</th>
						<th scope="col">Type</th>
						<th scope="col">Balance</th>
						<th scope="col">From</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach($transactions as $transaction)
					<tr>
						<th scope="row">{{ $transaction->id }}</th>
						<td colspan="2">{{ $transaction->transaction_num }}</td>
						<td>{{ $transaction->type }}</td>
						<td>{{ $transaction->balance }}</td>
						<td>{{ $transaction->account->account_num }}</td>
					</tr>
					@endforeach
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection