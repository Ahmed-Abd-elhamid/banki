<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\DepositeWithdrawTransaction;
use App\Models\TransferTransaction;

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
            if( $transaction->type == 'deposite_withdraw' ){
                $balance = rand(-1000,1000);
                DepositeWithdrawTransaction::create([
                    'balance' => $balance,
                    'type' => ($balance > 0) ? 'deposite':'withdraw',
                    'transaction_id' => $transaction->id,
                    'account_id' => Account::inRandomOrder()->first()->id
                ]);
            }elseif( $transaction->type == 'transfer' ){
                TransferTransaction::create([
                    'balance' => rand(500,10000),
                    'transaction_id' => $transaction->id,
                    'account_id' => Account::inRandomOrder()->first()->id
                ]);
                TransferTransaction::create([
                    'balance' => rand(1000,100000),
                    'transaction_id' => $transaction->id,
                    'account_id' => Account::inRandomOrder()->first()->id
                ]);
            }
        }
    }
}
