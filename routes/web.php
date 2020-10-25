<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::resource('banks', 'App\Http\Controllers\BankController')->only([
    'index', 'show'
]);
Route::resource('accounts', 'App\Http\Controllers\AccountController')->middleware('auth');
Route::put('/accounts/deactivate/{account}', 'App\Http\Controllers\AccountController@deactivate')->name('accounts.deactivate')->middleware('password.confirm');


Route::resource('transactions', 'App\Http\Controllers\TransactionController')->middleware('auth')->only([
    'index', 'show'
]);
Route::delete('transactions/{transactions}', 'App\Http\Controllers\TransactionController@destroy')->name('transactions.destroy')->middleware('password.confirm');
Route::get('convert', 'App\Http\Controllers\TransactionController@convert')->name('transactions.convert');

Route::resource('transfer_transactions', 'App\Http\Controllers\TransferTransactionController')->middleware('password.confirm')->only([
    'create', 'store'
]);
Route::resource('deposite_withdraw_transactions', 'App\Http\Controllers\DepositeWithdrawTransactionController')->middleware('password.confirm')->only([
    'create', 'store'
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});