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
Route::apiResource('users', 'App\Http\Controllers\API\UserController')->only([
    'index', 'show'
]);
Route::apiResource('banks', 'App\Http\Controllers\API\BankController')->only([
    'index', 'show'
]);
Route::apiResource('accounts', 'App\Http\Controllers\API\AccountController')->only([
    'index', 'show'
]);
Route::apiResource('transactions', 'App\Http\Controllers\API\TransactionController')->only([
    'index', 'show'
]);

Route::get('/', 'App\Http\Controllers\API\ApiController@index');