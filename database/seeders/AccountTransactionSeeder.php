<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccountTransaction;
use App\Models\Account;
use App\Models\Transaction;

class AccountTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Transaction::all() as $transaction){
            AccountTransaction::create([
                'transaction_id' => $transaction->id,
                'account_id' => Account::inRandomOrder()->first()->id
            ]);
        }
    }
}
