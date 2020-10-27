<?php

namespace App\Repository\Eloquent;

use App\Models\Transaction;
use App\Repository\TransactionRepositoryInterface;
use Illuminate\Support\Collection;

class TransactionRepository extends BaseRepository implements TransactionRepositoryInterface
{

   /**
    * TransactionRepository constructor.
    *
    * @param Transaction $model
    */
   public function __construct(Transaction $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }

   public function all_by_user($user): Collection
   {
	return $this->model->where('user_id', $user->id)->orderBy('id', 'DESC')->get();
   }

   public function find_by_transaction_num($transaction_num): Collection
   {
	return $this->model->where('transaction_num', $transaction_num)->orderBy('id', 'DESC')->get();
   }

   public function auth_find($transaction, $user)
   {
		if(!is_null($user) && $transaction->account->user->id == $user->id){
			$transactions = Transaction::where('transaction_num', $transaction->transaction_num)->get();

			return response()->view('transactions.show', ['transactions' => $transactions, 'transaction_sample' => $transaction]);
		}else{
			return redirect()->route('transactions.index')->with('alert', 'Unauthorized!');
		}
   }

   public function find_currency($from_currency, $to_currency, $ammount)
   {
		if(is_null($from_currency) || is_null($to_currency) || is_null($ammount)){
			return response()->view('transactions.convert', ['ammount' => 0]);
		}else{
			return response()->view('transactions.convert', ['result' => Transaction::convert_currency($ammount, $from_currency, $to_currency), 'ammount' => $ammount, 'from' => $from_currency, 'to' => $to_currency]);
		}
   }
}