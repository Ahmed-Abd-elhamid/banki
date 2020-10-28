<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\Eloquent\TransactionRepository;
use DateTime;
use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    private $transactionRepository;
  
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = Auth::user()->transactions->SortByDesc('id');
        if ($request->date && !is_null($request->date) && in_array(strtoupper($request->date), ['HOUR', 'WEEK', 'MONTH', 'YEAR'])){
            $this->transactionRepository->filter_by_data($transactions, $request->date);
        }
        return response()->view('transactions.index', ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $user_accounts = Account::where('user_id', Auth::user()->id)->where('is_active', 1)->orderBy('id', 'DESC')->get(['id', 'account_num']);

        return $this->transactionRepository->create_by_type($type, $user_accounts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_transfer(TransactionRequest $request)
    {
        $transaction_num = Transaction::generate_unique_num();
        $this->transactionRepository->create_transfer($request, $transaction_num);

        return redirect()->route('transactions.index')->with('success', 'Created Successfully!');   
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_deposite_withdraw(TransactionRequest $request)
    {
        $transaction_num = Transaction::generate_unique_num();
        $this->transactionRepository->create_deposite_withdraw($request, $transaction_num);

        return redirect()->route('transactions.index')->with('success', 'Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return $this->transactionRepository->auth_find($transaction ,Auth::user());
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function convert(Request $request)
    {
        return $this->transactionRepository->find_currency($request->from_currency, $request->to_currency, $request->ammount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return response()->view('transactions.edit', ['transaction' => $transaction, 'transactions' => $transaction->transactions]);
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
        if(!is_null(Auth::user()) && $transaction->account->user->id == Auth::user()->id){
            if(!$transaction->can_delete()){
                return redirect()->route('transactions.index')->with('alert', 'Out of Date!');
            }
            Transaction::where('transaction_num', $transaction->transaction_num)->delete();
            return redirect()->route('transactions.index')->with('success', 'Deleted Successfully!');
        }else{
            return redirect()->route('transactions.index')->with('alert', 'Unauthorized!');
        }

    }
}
