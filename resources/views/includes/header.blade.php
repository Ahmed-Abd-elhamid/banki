<nav class="navbar navbar-expand-md navbar-dark bg-darkblue shadow-sm">
	<div class="container">
		<a class="navbar-brand bg-white text-dark rounded p-1 pr-2 hvr-grow-shadow" href="{{ url('/') }}">
			<img src="{{ asset('img/logo.png') }}" alt="logo" class="img-fluid" width="30"> Bankey
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link hvr-sink" href="{{ route('banks.index') }}">Banks</a>
				</li>
				<li class="nav-item">
					<a class="nav-link hvr-sink" href="{{ route('accounts.index') }}">Accounts</a>
				</li>
				<li class="nav-item">
					<a class="nav-link hvr-sink" href="{{ route('transactions.index') }}">Transactions</a>
				</li>
				<li class="nav-item">
					<a class="nav-link hvr-sink" href="{{ route('transactions.convert') }}">Converter</a>
				</li>
				<li class="nav-item">
					<a class="nav-link hvr-sink" href="{{ route('api.end_points') }}">API End-Points</a>
				</li>
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
				@guest
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
				</li>
				@if (Route::has('register'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
				</li>
				@endif
				@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->name }}
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('accounts.index') }}">
							My Accounts
						</a>
						<a class="dropdown-item" href="{{ route('accounts.create') }}">
							New Account
						</a>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</div>
				</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>