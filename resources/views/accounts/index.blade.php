@extends('layouts.app')

@section('css')
<link href="{{ asset('css/accounts/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row justify-content-center shadow rounded">
	<div class="col-10 text-center p-1 border-right">
		<div class="header">
			<h2 class="animation a1">Welcome Back</h2>
			<h4 class="animation a2">All your Accounts</h4>
		</div>
	</div>
	<div class="col-2 text-center p-4">
		<div class="header">
			<a class="btn btn-success rounded shadow" href="{{ route('accounts.create') }}">New Account</a>
		</div>
	</div>
</div>
<hr>
<div class="row justify-content-center shadow rounded">
	<div class="col-10 p-3">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col" colspan="2">Account Num</th>
						<th scope="col">Type</th>
						<th scope="col">Currency</th>
						<th scope="col">is Active</th>
						<th scope="col">User</th>
						<th scope="col">Bank</th>
						<th scope="col">More..</th>
					</tr>
				</thead>
				<tbody>
					@foreach($accounts as $account)
					<tr class="{{ $account->is_active ? 'alert-success':'alert-danger'}}">
						<th scope="row">{{ $account->id }}</th>
						<td colspan="2">{{ $account->account_num }}</td>
						<td>{{ $account->type }}</td>
						<td>{{ $account->currency }}</td>
						@if ($account->is_active)
						<td class="text-success"><strong>Activated</strong></td>
						@else
						<td class="text-danger"><strong>Deactivated</strong></td>
						@endif
						<td>{{ $account->user->name }}</td>
						<td>{{ $account->bank->name }}</td>
						<td><a class="btn btn-sm btn-primary" href="{{ route('accounts.show', $account->id) }}">Show
								Details</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-10 p-auto justify-content-center">
		<p class="justify-content-center">{{ $accounts->links("pagination::bootstrap-4") }}</p>
	</div>
</div>
@endsection

@section('js')

@endsection