<div class="container">
	<div class="row justify-content-center">
		@if ($msg = Session::get('success'))
		<div class="col-10 alert alert-success alert-dismissible text-center mt-3 ml-3 mr-3">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> {{ $msg }}
		</div>
		@endif

		@if ($msg = Session::get('alert'))
		<div class="col-10 alert alert-danger alert-dismissible text-center mt-3 ml-3 mr-3">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Alert!</strong> {{ $msg }}
		</div>
		@endif

		@if ($msg = Session::get('warning'))
		<div class="col-10 alert alert-warning alert-dismissible text-center mt-3 ml-3 mr-3">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Warning!</strong> {{ $msg }}
		</div>
		@endif

		@if ($errors->any())
		<div class="col-10 alert alert-danger alert-dismissible text-center mt-3 ml-3 mr-3">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>