<?php

namespace App\GraphQL\Queries;

use App\Models\Transaction;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class TransactionQuery extends Query
{
    protected $attributes = [
        'name' => 'transaction',
    ];

    public function type(): Type
    {
        return GraphQL::type('Transaction');
    }

    public function args():array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Transaction::findOrFail($args['id']);
    }
}