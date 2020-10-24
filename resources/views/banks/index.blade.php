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
		{{-- <div class="header">
			<a class="btn btn-success rounded shadow" href="{{ route('banks.create') }}">New Bank</a>
		</div> --}}
	</div>
</div>
<hr>
<div class="row justify-content-center shadow rounded">
	<div class="col-10 p-3">
		<table class="table table-hover">
			<thead>
			  <tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Website</th>
				<th scope="col" colspan="2">About</th>
			  </tr>
			</thead>
			<tbody>
				@foreach($banks as $bank)
				<tr>
				<th scope="row">{{ $bank->id }}</th>
					<td>{{ $bank->name }}</td>
					<td>{{ $bank->email }}</td>
					<td>{{ $bank->website }}</td>
					<td colspan="2">{{ $bank->about }}</td>
				</tr>
				@endforeach
			</tbody>
		  </table>
	</div>
</div>
@endsection

@section('js')

@endsection