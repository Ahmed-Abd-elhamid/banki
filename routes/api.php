<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;

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

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return new UserResource($request->user());
});

Route::post('/users/login', 'App\Http\Controllers\API\UserController@login');
Route::get('/users/{user}', 'App\Http\Controllers\API\UserController@show');

Route::apiResource('banks', 'App\Http\Controllers\API\BankController')->only([
    'index', 'show'
]);
Route::apiResource('accounts', 'App\Http\Controllers\API\AccountController')->only([
    'index', 'show'
])->middleware('auth:sanctum');
Route::apiResource('transactions', 'App\Http\Controllers\API\TransactionController')->only([
    'index', 'show'
])->middleware('auth:sanctum');

Route::get('/', 'App\Http\Controllers\API\ApiController@index')->name('api.end_points');