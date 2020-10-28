<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use App\Repository\Interfaces\AccountRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = $this->accountRepository->all_by_user(Auth::user());
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
    public function store(AccountRequest $request)
    {
        $this->accountRepository->create([
            'type' => $request->type,
            'balance' => $request->balance,
            'currency' => $request->currency,
            'bank_id' => $request->bank_id,
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
        return $this->accountRepository->auth_find($account ,Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        if(!is_null(Auth::user()) && $account->user_id == Auth::user()->id){
            if($account->is_active){
                return response()->view('accounts.edit', ['account' => $account, 'banks' => Bank::all()]);
            }else{
                return redirect()->route('accounts.show', $account)->with('alert', 'you must activate it first, before editing!');
            }
        }else{
            return redirect()->route('accounts.index')->with('alert', 'Unauthorized!');
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
        $msg = $this->accountRepository->deactivate($account);
        return redirect()->route('accounts.show', $account)->with('success', $msg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, Account $account)
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
