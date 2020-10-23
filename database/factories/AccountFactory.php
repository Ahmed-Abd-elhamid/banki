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
        $currencies = ['USD', 'EURO', 'EGP', 'SAR', 'YEN'];
        return [
            'account_num' => $this->generate_unique_num(),
            'balance' => rand(1000,1000),
            'type' => $types[rand(0,3)],
            'currency' => $currencies[rand(0,4)],
            'bank_id' => Bank::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }

    private function generate_unique_num(){
        $account_num = mt_rand(100000000000, 999999999999);
        while (Account::where('account_num', $account_num)->exists()){
            $account_num = mt_rand(100000000000, 999999999999);
        }
        return $account_num;
    }

}
