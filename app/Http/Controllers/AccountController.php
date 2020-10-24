<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAccount;
use App\Http\Requests\UpdateAccount;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return response()->view('accounts.index', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('accounts.create', ['banks' => Bank::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Account::create([
            'type' => $request->type,
            'currency' => $request->currency,
            'bank_id' => $request->bank,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('accounts.index')->with('success', 'Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return response()->view('accounts.show', ['account' => $account]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        if($account->is_active){
            return response()->view('accounts.edit', ['account' => $account, 'banks' => Bank::all()]);
        }else{
            return redirect()->route('accounts.show', $account)->with('alert', 'you must activate it first, before editing!');
        }
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, Account $account)
    {
        if($account->is_active){
            $account->update([
                'is_active' => false
            ]);
            return redirect()->route('accounts.show', $account)->with('success', 'Deactivated Successfully!');

        }else{
            $account->update([
                'is_active' => true
            ]); 
            return redirect()->route('accounts.show', $account)->with('success', 'Activated Successfully!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account->fill($request->all())->save();
        return redirect()->route('accounts.show', $account)->with('success', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
