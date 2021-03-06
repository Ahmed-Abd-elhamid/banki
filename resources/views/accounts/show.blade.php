@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="row justify-content-center m-3 p-1 rounded shadow border">
	<div class="col-10 text-center">
		<h2>welcome {{ $account->user->name }} to your account</h2>
	</div>
	<div class="col-10">
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
						<th scope="col">Balance</th>
						<th scope="col">Deactivate</th>
						<th scope="col">Edit</th>
					</tr>
				</thead>
				<tbody>
					<tr class="{{ $account->is_active ? 'alert-success':'alert-danger'}}">
						<th scope="row">{{ $account->id }}</th>
						<td colspan="2">{{ $account->account_num }}</td>
						<td>{{ ucfirst($account->type) }}</td>
						<td>{{ $account->currency }}</td>
						@if ($account->is_active)
						<td class="text-success"><strong>Activated</strong></td>
						@else
						<td class="text-danger"><strong>Deactivated</strong></td>
						@endif
						<td>{{ $account->user->name }}</td>
						<td>{{ $account->bank->name }}</td>
						<td>{{ $account->balance }}</td>
						<td>
							<form method="POST" action="{{route('accounts.deactivate', $account)}}"
								enctype="multipart/form-data"
								onsubmit="return confirm('Do you want to change the account activation mode?');">
								@csrf
								{{method_field('PUT')}}
								@if ($account->is_active)
								<button type="submit" class="btn btn-sm  btn-danger hvr-skew">Deactivate</button>
								@else
								<button type="submit" class="btn btn-sm btn-success hvr-skew">Activate</button>
								@endif
							</form>
						</td>
						<td>
							@if ($account->is_active)
							<a class="btn btn-sm btn-primary hvr-pop"
								href="{{ route('accounts.edit', $account) }}">Edit</a>
							@else
							<button class="btn btn-sm btn-primary" disabled
								href="{{ route('accounts.edit', $account) }}">Edit</button>
							@endif
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection