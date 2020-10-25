<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DepositeWithdrawTransactionController extends Controller
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
        $user_accounts = Account::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get(['id', 'account_num']);

        return response()->view('transactions.deposite_withdraw.create', ['account_numbers' => $user_accounts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( $this->validate_request($request) ){
            $transaction_num = Transaction::generate_unique_num();
            $current_user = Auth::user();
            
            DB::transaction(function () use ($request, $transaction_num, $current_user) {
                for ($current_item = 1; $current_item < ($request->items + 1); $current_item++) {
                    $current_date = now();

                    $my_account = Account::firstWhere('account_num', $request->input('my_account'.$current_item));

                    $transaction = DB::insert('insert into transactions (transaction_num, type, balance, account_id, created_at, updated_at) values (?, ?, ?, ?, ?, ?)',  [ $transaction_num, $request->input('type'.$current_item), $request->input('balance'.$current_item), $my_account->id, $current_date, $current_date]);

                    if( $request->input('type'.$current_item) == 'deposite'){
                        $balance_in = $my_account->balance + Transaction::convert_currency($request->input('balance'.$current_item), 'EGP', $my_account->currency);
                        DB::update('update accounts set balance = ? where id = ?', [$balance_in ,$my_account->id]);
                    }else{
                        $balance_out = $my_account->balance - Transaction::convert_currency($request->input('balance'.$current_item), 'EGP', $my_account->currency);
                        if($balance_out <= 0){
                            return DB::rollBack();
                        }
                        DB::update('update accounts set balance = ? where id = ?', [$balance_out ,$my_account->id]);
                    }
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
     * @param  \App\Models\DepositeWithdrawTransaction  $depositeWithdrawTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(DepositeWithdrawTransaction $depositeWithdrawTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepositeWithdrawTransaction  $depositeWithdrawTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(DepositeWithdrawTransaction $depositeWithdrawTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepositeWithdrawTransaction  $depositeWithdrawTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepositeWithdrawTransaction $depositeWithdrawTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepositeWithdrawTransaction  $depositeWithdrawTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepositeWithdrawTransaction $depositeWithdrawTransaction)
    {
        //
    }

    private function validate_request($request){
        if ( $request->items > 0){
            for ($current_item = 1; $current_item < ($request->items + 1); $current_item++) {
                if( ($request->input('my_account'.$current_item) == null) || ($request->input('type'.$current_item) == null) || ($request->input('balance'.$current_item) == null)){ return false;}
    
                if ( $this->check_account_numbers($request->input('my_account'.$current_item)) ){ return false;}
            }
            return true;
        }else{
            return true;
        }
    }

    private function check_account_numbers($my_account){
       if ( empty(Account::firstWhere('account_num', $my_account)) ){
           return true;
       } else {
            return false;
       }
    }
}
