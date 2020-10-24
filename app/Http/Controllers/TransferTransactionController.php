<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\TransferTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $user_accounts = Account::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get(['id', 'account_num']);

        return response()->view('transactions.transfer.create', ['account_numbers' => Account::all(['id', 'account_num']), 'user_accounts' => $user_accounts]);
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

                    $account_to = Account::firstWhere('account_num', $request->input('to_account'.$current_item));
                    $account_from = Account::firstWhere('account_num', $request->input('from_account'.$current_item));

                    $transaction = DB::insert('insert into transactions (transaction_num, type, balance, account_id, to_account_id ,created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?)',  [ $transaction_num, 'transfer', $request->input('balance'.$current_item), $account_from->id, $account_to->id, $current_date, $current_date]);
                }
            });
            return redirect()->route('transactions.index')->with('success', 'Created Successfully!');
        }else{
            return redirect()->route('transfer_transactions.create')->with('alert', 'Some Data is invalid!');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransferTransaction  $transferTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(TransferTransaction $transferTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransferTransaction  $transferTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferTransaction $transferTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransferTransaction  $transferTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransferTransaction $transferTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransferTransaction  $transferTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferTransaction $transferTransaction)
    {
        //
    }

    private function validate_request($request){
        if ( $request->items > 0){
            for ($current_item = 1; $current_item < ($request->items + 1); $current_item++) {
                if( ($request->input('from_account'.$current_item) == null) || ($request->input('to_account'.$current_item) == null) || ($request->input('balance'.$current_item) == null)){ return false;}
    
                if ( $this->check_account_numbers($request->input('from_account'.$current_item), $request->input('to_account'.$current_item)) ){ return false;}
            }
            return true;
        }else{
            return true;
        }
    }

    private function check_account_numbers($from_account, $to_account){
       if ( empty(Account::firstWhere('account_num', $from_account)) || empty(Account::firstWhere('account_num', $to_account)) ){
           return true;
       } else {
            return false;
       }
    }
}
