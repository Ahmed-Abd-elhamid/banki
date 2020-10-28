<?php

namespace App\graphql\Mutations;

use App\Transaction;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateTransactionMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createTransfer'
    ];

    public function type(): Type
    {
        return GraphQL::type('Transaction');
    }

    public function args(): array
    {
        return [
            'balance' => [
                'name' => 'balance',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'my_account' => [
                'name' => 'my_account',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'type' => [
                'name' => 'type',
                'type' =>  Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $transfer = new Transaction();
        $transfer->fill($args);
        $transfer->save();

        return $transfer;
    }
}