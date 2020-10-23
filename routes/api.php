<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('banks', 'App\Http\Controllers\API\BankController');
Route::apiResource('accounts', 'App\Http\Controllers\API\AccountController');
Route::apiResource('transactions', 'App\Http\Controllers\API\TransactionController');

