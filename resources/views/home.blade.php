@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <img src="img/avatar.png" class="img-fluid rounded-circle" alt="avatar" height="180"/>
                </div>

                <div class="card-body">
                    <div class="m-1 pt-2 p-auto text-center border rounded">
                        <h5>{{ $user->name }}</h5>
                    </div>
                    <div class="m-1 pt-2 p-auto text-center border rounded">
                        <h5>{{ $user->email }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body pl-5 pr-5">
                    <a class="btn d-inline" href="{{ route('transactions.index') }}"><h3 class="p-1 bg-darkblue text-center text-white rounded shadow hvr-grow-shadow d-block">Check Your Transactions</h3></a>
                    <a class="btn d-inline" href="{{ route('accounts.index') }}"><h3 class="p-1 bg-darkblue text-center text-white rounded shadow hvr-grow-shadow d-block">User Account's</h3></a>
                    @foreach($user->accounts as $account)
                        <div class="m-1 pt-2 p-auto text-center border rounded hvr-shadow d-block">
                        <h5><a href="{{ route('accounts.show', $account->id) }}">{{ $account->type }} - {{ $account->account_num }} - {{ $account->bank->name }}</a></h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
