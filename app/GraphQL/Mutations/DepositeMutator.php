<?php

namespace App\graphql\Mutations;

use App\Models\Transaction;
use App\Models\Account;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class DepositeMutator extends Mutation
{
    protected $attributes = [
        'name' => 'createDeposite'
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
            'my_account_num' => [
                'name' => 'my_account_num',
                'type' =>  Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, $args)
    {

        return Account::where('account_num', $args->my_account_num);
        $withdraw = new Transaction();
        $withdraw->fill([
            'balance' => $args->balance,
            'account_id' => Account::where('account_num', $args->my_account_num)->first()->id,
        ]);
        $withdraw->save();

        return $withdraw;
    }
}