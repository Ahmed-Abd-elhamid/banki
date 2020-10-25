<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $transactions = $user->transactions;
        if ($request->date && !is_null($request->date)){
            if($request->date == 'hour'){
                $transactions = $transactions->where('created_at', '>=', new DateTime('-1 hour'));
            }elseif($request->date == 'day'){
                    $transactions = $transactions->where('created_at', '>=', new DateTime('-1 day'));
            }elseif($request->date == 'week'){
                $transactions = $transactions->where('created_at', '>=', new DateTime('-1 week'));
            }elseif($request->date == 'month'){
                $transactions = $transactions->where('created_at', '>=', new DateTime('-1 month'));
            }elseif($request->date == 'year'){
                $transactions = $transactions->where('created_at', '>=', new DateTime('-1 year'));
            }
        }
        return response()->view('transactions.index', ['transactions' => $transactions->SortByDesc('id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($transaction_num)
    {
        $transactions = Transaction::where('transaction_num', $transaction_num)->get();

        return response()->view('transactions.show', ['transactions' => $transactions, 'transaction_sample' => $transactions->first()]);
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function details($transaction)
    {
        dd($transaction);
        return response()->view('transactions.show', ['transaction' => $transaction]);
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
    public function destroy($transaction_num)
    {
        Transaction::where('transaction_num', $transaction_num)->delete();
        return redirect()->route('transactions.index')->with('success', 'Deleted Successfully!');
    }
}
