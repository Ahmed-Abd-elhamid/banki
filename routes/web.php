<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::delete('transactions/{transaction}', 'App\Http\Controllers\TransactionController@destroy')->name('transactions.destroy')->middleware('password.confirm');
Route::get('convert', 'App\Http\Controllers\TransactionController@convert')->name('transactions.convert');

Route::get('transactions/create/{type}', 'App\Http\Controllers\TransactionController@create')->middleware('password.confirm')->name('transactions_type.create');

Route::post('transactions/transfer', 'App\Http\Controllers\TransactionController@store_transfer')->middleware('password.confirm')->name('transactions_transfer.store');

Route::post('transactions/depsoite_withdraw', 'App\Http\Controllers\TransactionController@store_deposite_withdraw')->middleware('password.confirm')->name('transactions_deposite_withdraw.store');

Route::resource('transactions', 'App\Http\Controllers\TransactionController')->middleware('auth')->only([
    'index', 'show'
]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});