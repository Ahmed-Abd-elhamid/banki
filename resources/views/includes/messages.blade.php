<div class="container">
	<div class="row justify-content-center">
		@if ($msg = Session::get('success'))
		<div class="col-8 alert alert-success alert-dismissible text-center mt-3 ml-4 mr-4">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> {{ $msg }}
		</div>
		@endif

		@if ($msg = Session::get('alert'))
		<div class="col-8 alert alert-danger alert-dismissible text-center mt-3 ml-4 mr-4">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Alert!</strong> {{ $msg }}
		</div>
		@endif

		@if ($msg = Session::get('warning'))
		<div class="col-8 alert alert-warning alert-dismissible text-center mt-3 ml-4 mr-4">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Warning!</strong> {{ $msg }}
		</div>
		@endif
	</div>
</div>