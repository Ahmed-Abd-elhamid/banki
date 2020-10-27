<?php
namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'Details about a transaction',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the transaction',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The transaction_num of the transaction',
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The balance of the transaction',
			],
			'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The created_at of the transaction',
			],
			'updated_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The updated_at of the transaction',
            ]
        ];
    }
}