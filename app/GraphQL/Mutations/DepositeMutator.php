<?php

namespace App\GraphQL\Mutations;
use App\Models\Transaction;

class DepositeMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        return Transaction::where('type', 'deposite')->get();
    }
}
