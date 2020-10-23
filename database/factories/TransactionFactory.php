<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['deposit', 'withdraw', 'transfer'];
        $type = $types[rand(0,2)];
        return [
            // 'account_num' => $this->generate_unique_num(),
            'type' => $type,
            'money_in' => $type != 'withdraw' ? rand(500,10000): 0,
            'money_out' => $type == 'withdraw' ? rand(500,10000): 0,
            'transfer_from' => $type == 'transfer' ? Account::inRandomOrder()->first()->account_num: null,
            // 'bank_id' => Bank::inRandomOrder()->first()->id,
            // 'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
