<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Http\Resources\UserGraphQL;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'account',
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
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
        return new UserGraphQL(User::findOrFail($args['id']));
    }
}