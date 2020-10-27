<?php

namespace App\GraphQL\Mutations;
use App\Models\Transaction;

class WithdrawMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        return Transaction::where('type', 'withdraw')->pluck('balance');
    }
}
