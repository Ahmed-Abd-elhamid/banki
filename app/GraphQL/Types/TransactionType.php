<?php
namespace App\GraphQL\Types;

use App\Models\Transaction;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TransactionType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Transaction',
        'description' => 'Details about a transaction',
        'model' => Transaction::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the transaction',
            ],
            'transaction_num' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The transaction_num of the transaction',
            ],
            'balance' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The balance of the transaction',
			],
			'account' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The account of the transaction',
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