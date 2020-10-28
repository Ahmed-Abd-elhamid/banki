<?php

namespace App\Repository\Repositories;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repository\Interfaces\TransactionRepositoryInterface;
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
        return Transaction::where('transaction_num', $transaction->transaction_num)->get();
    }else{
        abort(403);
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

   public function filter_by_data($transactions, $data){
      return $transactions->where('created_at', '>=', new DateTime('-1 '."$data"));
   }

   public function create_by_type($type, $user_accounts){
      if($type == 'transfer'){
         return response()->view('transactions.transfer.create', ['account_numbers' => Account::where('is_active', 1)->get(['id', 'account_num']), 'user_accounts' => $user_accounts]);
     }elseif($type == 'deposite_withdraw'){
         return response()->view('transactions.deposite_withdraw.create', ['account_numbers' => $user_accounts]);
     }else{
      return redirect()->route('transactions.index')->with('warning', 'Unavaliable type!');
     }
   }

   public function create_transfer($request, $transaction_num){
      DB::transaction(function () use ($request, $transaction_num) {
         for ($current_item = 0; $current_item < $request->items; $current_item++) {
             $account_to = Account::firstWhere('account_num', $request->to_account[$current_item]);
             $account_from = Account::firstWhere('account_num', $request->from_account[$current_item]);
             $balance_out = $account_from->balance - Transaction::convert_currency($request->balance[$current_item], 'EGP', $account_from->currency);;
             $balance_in = $account_to->balance + Transaction::convert_currency($request->balance[$current_item], 'EGP', $account_to->currency);;
             
             if($balance_out <= 0){
                 return DB::rollBack();
             }

             DB::insert('insert into transactions (transaction_num, type, balance, account_id, to_account_id ,created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?)',  [ $transaction_num, 'transfer', $request->balance[$current_item], $account_from->id, $account_to->id, now(), now()]);
             
             DB::update('update accounts set balance = ? where id = ?', [$balance_out ,$account_from->id]);
             DB::update('update accounts set balance = ? where id = ?', [$balance_in ,$account_to->id]);
         }
     });
   }

   public function create_deposite_withdraw($request, $transaction_num){
    DB::transaction(function () use ($request, $transaction_num) {
        for ($current_item = 0; $current_item < $request->items; $current_item++) {
            $current_date = now();

            $my_account = Account::firstWhere('account_num', $request->my_account[$current_item]);

            if( $request->type[$current_item] == 'withdraw'){
                $balance_out = $my_account->balance - Transaction::convert_currency($request->balance[$current_item], 'EGP', $my_account->currency);
                if($balance_out <= 0){
                    return DB::rollBack();
                }
            }else{
                $balance_in = $my_account->balance + Transaction::convert_currency($request->balance[$current_item], 'EGP', $my_account->currency);
            }

            $transaction = DB::insert('insert into transactions (transaction_num, type, balance, account_id, created_at, updated_at) values (?, ?, ?, ?, ?, ?)',  [ $transaction_num, $request->type[$current_item], $request->balance[$current_item], $my_account->id, $current_date, $current_date]);

            if( $request->type[$current_item] == 'withdraw'){
                DB::update('update accounts set balance = ? where id = ?', [$balance_out ,$my_account->id]);
            }else{
                DB::update('update accounts set balance = ? where id = ?', [$balance_in ,$my_account->id]);
            }
        }
    });
 }
}