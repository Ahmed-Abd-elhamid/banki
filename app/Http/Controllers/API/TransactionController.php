<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = TransactionResource::collection(Transaction::all());
        if ($request->type && !is_null($request->type)){
            if($request->type == 'deposite'){
                $transactions = TransactionResource::collection(Transaction::where('type', 'deposite')->get());
            }elseif($request->type == 'withdraw'){
                    $transactions = TransactionResource::collection(Transaction::where('type', 'withdraw')->get());
            }elseif($request->type == 'transfer'){
                $transactions = TransactionResource::collection(Transaction::where('type', 'transfer')->get());
            }
        }        
        return $transactions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return  new TransactionResource($transaction);
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
