<?php

namespace App\Http\Controllers;

use App\Models\DepositeWithdrawTransaction;
use Illuminate\Http\Request;

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
        return response()->view('transactions.deposite_withdraw.create', ['account_numbers' => Account::all()->pluck('account_num')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
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
}
