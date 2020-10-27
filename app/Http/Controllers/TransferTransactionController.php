<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TransferStore;

class TransferTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_accounts = Account::where('user_id', Auth::user()->id)->where('is_active', 1)->orderBy('id', 'DESC')->get(['id', 'account_num']);

        return response()->view('transactions.transfer.create', ['account_numbers' => Account::where('is_active', 1)->get(['id', 'account_num']), 'user_accounts' => $user_accounts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransferStore $request)
    {        
        if ( $request->validate_request($request) ){
            $transaction_num = Transaction::generate_unique_num();
            
            DB::transaction(function () use ($request, $transaction_num) {
                for ($current_item = 1; $current_item < ($request->items + 1); $current_item++) {

                    $account_to = Account::firstWhere('account_num', $request->input('to_account'.$current_item));
                    $account_from = Account::firstWhere('account_num', $request->input('from_account'.$current_item));
                    
                    $balance_out = $account_from->balance - Transaction::convert_currency($request->input('balance'.$current_item), 'EGP', $account_from->currency);;
                    $balance_in = $account_to->balance + Transaction::convert_currency($request->input('balance'.$current_item), 'EGP', $account_to->currency);;

                    if($balance_out <= 0){
                        return DB::rollBack();
                    }

                    DB::insert('insert into transactions (transaction_num, type, balance, account_id, to_account_id ,created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?)',  [ $transaction_num, 'transfer', $request->input('balance'.$current_item), $account_from->id, $account_to->id, now(), now()]);
                    
                    DB::update('update accounts set balance = ? where id = ?', [$balance_out ,$account_from->id]);
                    DB::update('update accounts set balance = ? where id = ?', [$balance_in ,$account_to->id]);
                }
            });

            if ( empty(Transaction::firstWhere('transaction_num', $transaction_num)) ){
                return redirect()->route('transfer_transactions.create')->with('alert', 'Unbalanced balance!');
            }else{
                return redirect()->route('transactions.index')->with('success', 'Created Successfully!');
            }
            
        }else{
            return redirect()->route('transfer_transactions.create')->with('alert', 'Some Data is invalid!');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
