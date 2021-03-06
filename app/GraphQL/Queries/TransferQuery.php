<?php
namespace App\GraphQL\Queries;

use App\Models\Transaction;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class transferQuery extends Query
{
    protected $attributes = [
        'name' => 'transfer',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Transaction'));
    }

    public function resolve($root, $args)
    {
        return Transaction::where('type', 'deposite')->get();
    }
}