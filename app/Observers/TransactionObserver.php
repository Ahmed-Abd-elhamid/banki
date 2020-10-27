<?php

namespace App\Observers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionObserver
{
    /**
     * Handle the transaction "created" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function created(Transaction $transaction)
    {
        if($transaction->type == 'transfer'){
            DB::transaction(function () use ($transaction) {

                $balance_out = $transaction->account->balance - Transaction::convert_currency($transaction->balance, 'EGP', $transaction->account->currency);;
                $balance_in = $transaction->to_account->balance + Transaction::convert_currency($transaction->balance, 'EGP', $transaction->to_account->currency);;

                if($balance_out <= 0){
                    return DB::rollBack();
                }

                DB::update('update accounts set balance = ? where id = ?', [$balance_out ,$transaction->account->id]);
                DB::update('update accounts set balance = ? where id = ?', [$balance_in ,$transaction->to_account->id]);
            });
        }else{
            DB::transaction(function () use ($transaction) {
                $my_account = $transaction->account;

                if( $transaction->type == 'withdraw'){
                    $balance_out = $my_account->balance - Transaction::convert_currency($transaction->balance, 'EGP', $my_account->currency);
                    if($balance_out <= 0){
                        return DB::rollBack();
                    }

                    DB::update('update accounts set balance = ? where id = ?', [$balance_out ,$my_account->id]);
                }else{
                    $balance_in = $my_account->balance + Transaction::convert_currency($transaction->balance, 'EGP', $my_account->currency);

                    DB::update('update accounts set balance = ? where id = ?', [$balance_in ,$my_account->id]);
                }
            });
        }
    }

    /**
     * Handle the transaction "updated" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function updated(Transaction $transaction)
    {
        //
    }

    /**
     * Handle the transaction "deleted" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function deleted(Transaction $transaction)
    {
        //
    }

    /**
     * Handle the transaction "restored" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function restored(Transaction $transaction)
    {
        //
    }

    /**
     * Handle the transaction "force deleted" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function forceDeleted(Transaction $transaction)
    {
        //
    }
}
