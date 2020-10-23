@extends('layouts.app')

@section('css')
<link href="{{ asset('css/welcome/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-12 col-md-12">
		<div class="text-center justift-content-center align-middle">
			<h1>Bankey</h1>
		</div>
	</div>
</div>
<div class="row justift-content-center">
	<div class="col-lg-12 col-md-12">
		<div class="full-image">
		</div>
	</div>
</div>
<hr>
<div class="row justify-content-center">
	<h1 class="col-12 text-center">Our Serives</h1>
	<hr>
	<div class="col-lg-3 col-md-10 m-3 text-center border rounded shadow">
		<p>Hello</p>
	</div>
	<div class="col-lg-3 col-md-10 m-3 text-center border rounded shadow">
		<p>Hello</p>
	</div>
	<div class="col-lg-3 col-md-10 m-3 text-center border rounded shadow">
		<p>Hello</p>
	</div>
</div>
<hr>
<div class="row justify-content-center">
	<h1 class="col-12 text-center">Team Members</h1>
	<hr>
	<div class="col-lg-3 col-md-5 col-sm-8 m-4 text-center border rounded shadow">
		<div class="p-3">
			<img src="{{ asset('img/profile.jpeg') }}" alt="profile" class="img-fluid rounded-circle" width="200">
		</div>
		<hr>
		<h4 class="mt-4">FrontEnd Developer</h4>
	</div>
	<div class="col-lg-3 col-md-5 col-sm-8 m-4 text-center border rounded shadow">
		<div class="p-3">
			<img src="{{ asset('img/profile.jpeg') }}" alt="profile" class="img-fluid rounded-circle" width="200">
		</div>
		<hr>
		<h4 class="mt-4">BackEnd Developer</h4>
	</div>
</div>

@endsection

@section('js')

@endsection