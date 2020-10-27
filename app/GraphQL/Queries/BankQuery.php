<?php

namespace App\GraphQL\Queries;

use App\Models\Bank;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class BankQuery extends Query
{
    protected $attributes = [
        'name' => 'bank',
    ];

    public function type(): Type
    {
        return GraphQL::type('Bank');
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
        return Bank::findOrFail($args['id']);
    }
}