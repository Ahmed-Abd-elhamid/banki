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
	<div class="col-lg-3 col-md-10 m-3 text-center border rounded shadow hvr-grow-shadow">
		<h3 class="p-1 bg-darkblue mt-2 rounded shadow text-white mb-4">Serive #1</h3>
		<p>Quisque magna dui, feugiat vitae scelerisque vitae, luctus eu risus. In vitae ex mattis, tincidunt sem vitae, congue nisl. Mauris erat tortor, consectetur quis purus id, consequat suscipit urna. Vivamus at consequat nisi. Sed lobortis faucibus rhoncus.</p>
	</div>
	<div class="col-lg-3 col-md-10 m-3 text-center border rounded shadow hvr-grow-shadow">
		<h3 class="p-1 bg-darkblue mt-2 rounded shadow text-white mb-4">Serive #2</h3>
		<p>Phasellus malesuada venenatis tellus, id facilisis neque tristique et. Ut ut mi id sem commodo aliquam. Nunc nec lectus a massa fringilla porta vel nec lorem. Donec eget elit semper, ullamcorper orci nec, dictum diam. Sed iaculis tristique odio ut luctus.</p>
	</div>
	<div class="col-lg-3 col-md-10 m-3 text-center border rounded shadow hvr-grow-shadow">
		<h3 class="p-1 bg-darkblue mt-2 rounded shadow text-white mb-4">Serive #3</h3>
		<p>Duis id scelerisque ex, vel tincidunt ipsum. Aliquam viverra euismod consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce et accumsan diam, eu viverra augue. Sed gravida luctus ante, et faucibus nibh porta non. Mauris vel velit id leo placerat tempus nec in dui.</p>
	</div>
</div>
<hr>
<div class="row justify-content-center bg-darkblue text-white p-2 pb-5">
	<h1 class="col-12 text-center">Our Clients</h1>
	<hr>
	<div class="col-lg-3 col-md-10 m-4 text-center border rounded shadow hvr-bounce-in bg-white">
		<h2 class="p-1 bg-darkblue mt-2 rounded shadow text-white">CIB</h2>
		<div style="height: 200px;">
			<img src="img/banks/cib.svg" alt="cib" class="img-fluid circle-rounded" height="180">
		</div>
	</div>
	<div class="col-lg-3 col-md-10 m-4 text-center border rounded shadow hvr-bounce-in bg-white">
		<h2 class="p-1 bg-darkblue mt-2 rounded shadow text-white mb-5">QNB</h2>
		<div style="height: 200px;">
			<img src="img/banks/qnb.png" alt="qnb" class="img-fluid circle-rounded" height="180">
		</div>
	</div>
	<div class="col-lg-3 col-md-10 m-4 text-center border rounded shadow hvr-bounce-in bg-white">
		<h2 class="p-1 bg-darkblue mt-2 rounded shadow text-white mb-4">HBCS</h2>
		<div style="height: 200px;">
			<img src="img/banks/hsbc.png" alt="hsbc" class="img-fluid circle-rounded" height="180">
		</div>
	</div>
</div>
<hr>
<div class="row justify-content-center">
	<h1 class="col-12 text-center">Team Members</h1>
	<hr>
	<div class="col-lg-3 col-md-5 col-sm-8 m-4 text-center border rounded shadow hvr-fade">
		<div class="p-3">
			<img src="{{ asset('img/profile.jpeg') }}" alt="profile" class="img-fluid rounded-circle" width="200">
		</div>
		<hr>
		<h4 class="mt-4">FrontEnd Developer</h4>
	</div>
	<div class="col-lg-3 col-md-5 col-sm-8 m-4 text-center border rounded shadow hvr-fade">
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