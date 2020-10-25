<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;
use DateTime;

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
        $dates = [now(), new DateTime('-1 hour'), new DateTime('-1 day'), new DateTime('-1 week'), new DateTime('-1 month')];
        $date = $dates[rand(0,4)];
        $types = ['deposite', 'withdraw', 'transfer'];
        $type = $types[rand(0,2)];
        return [
            // 'account_num' => $this->generate_unique_num(),
            'type' => $type,
            'balance' => rand(1000,10000),
            'account_id' => Account::inRandomOrder()->first()->id,
            'to_account_id' => $type == 'transfer' ? Account::inRandomOrder()->first()->id: null,
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
