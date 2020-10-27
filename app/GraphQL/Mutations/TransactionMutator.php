<?php

namespace App\GraphQL\Mutations;

class TransactionMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        if ($args['type']) {

        }

        return null;
    }

}
