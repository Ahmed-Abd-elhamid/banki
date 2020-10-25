<?php
namespace App\GraphQL\Types;

use App\Models\Account;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AccountType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Account',
        'description' => 'Details about a account',
        'model' => Account::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the account',
			],
            'account_num' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The account_num of the account',
            ],
            'balance' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The balance of the account',
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