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
	<div class="col-md-6 col-sm-12 border rounded p-3">
		<div class="left">
			<form class="p-5">
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
						placeholder="Enter email">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
						else.</small>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Check me out</label>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
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