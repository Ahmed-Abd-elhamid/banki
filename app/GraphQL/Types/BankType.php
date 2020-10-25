<?php
namespace App\GraphQL\Types;

use App\Models\Bank;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BankType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Bank',
        'description' => 'Details about a bank',
        'model' => Bank::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the bank',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the bank',
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of the bank',
            ],
            'website' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The website of the bank',
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