<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Bank;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Generator as Faker;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['current', 'saving', 'credit', 'joint'];
        $currencies = ['USD', 'EUR', 'EGP', 'SAR', 'GBP', 'CAD', 'JPY', 'AUD', 'AED'];
        return [
            // 'account_num' => $this->generate_unique_num(),
            'balance' => rand(10000,10000000),
            'type' => $types[rand(0,3)],
            'currency' => $currencies[rand(0,4)],
            'bank_id' => Bank::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }

}
