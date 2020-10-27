<?php
namespace App\GraphQL\Queries;

use App\Models\Bank;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class BanksQuery extends Query
{
    protected $attributes = [
        'name' => 'banks',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Bank'));
    }

    public function resolve($root, $args)
    {
        return Bank::all();
    }
}