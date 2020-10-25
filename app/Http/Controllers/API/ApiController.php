<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $end_points = [
            'users' => [
                'login' => [
                    'method' => 'POST',
                    'params' => '',
                    'body' => 'email, password',
                    'end-point' => 'api/users/login',
                    'description' => 'description',
                ],
                'current_user' => [
                    'method' => 'GET',
                    'header' => 'Accept: application/json, Authorization:  Bearer [Api Token]',
                    'params' => '',
                    'body' => '',
                    'end-point' => 'api/users',
                    'description' => 'description',
                ],
                'show' => [
                    'method' => 'GET',
                    'header' => 'Accept: application/json, Authorization:  Bearer [Api Token]',
                    'params' => '',
                    'body' => '',
                    'end-point' => 'api/users/{id}',
                    'description' => 'description',
                ],
            ],
            'accounts' => [
                'index' => [
                    'method' => 'GET',
                    'header' => 'Accept: application/json, Authorization:  Bearer [Api Token]',
                    'params' => '',
                    'body' => '',
                    'end-point' => 'api/accounts',
                    'description' => 'description',
                ],
                'show' => [
                    'method' => 'GET',
                    'header' => 'Accept: application/json, Authorization:  Bearer [Api Token]',
                    'params' => '',
                    'body' => '',
                    'end-point' => 'api/accounts/{id}',
                    'description' => 'description',
                ],
            ],
            'banks' => [
                'index' => [
                    'method' => 'GET',
                    'params' => '',
                    'body' => '',
                    'end-point' => 'api/banks',
                    'description' => 'description',
                ],
                'show' => [
                    'method' => 'GET',
                    'params' => '',
                    'end-point' => 'api/banks/{id}',
                    'description' => 'description',
                ],
            ],
            'transactions' => [
                'index' => [
                    'method' => 'GET',
                    'header' => 'Accept: application/json, Authorization:  Bearer [Api Token]',
                    'params' => '',
                    'body' => '',
                    'end-point' => 'api/transactions',
                    'description' => 'description',
                ],
                'by_type' => [
                    'method' => 'GET',
                    'header' => 'Accept: application/json, Authorization:  Bearer [Api Token]',
                    'params' => 'type',
                    'body' => '',
                    'end-point' => 'api/transactions?type={type}',
                    'notes' => 'Available {type}: (transfer, deposite, withdraw)',
                    'description' => 'description',
                ],
                'show' => [
                    'method' => 'GET',
                    'header' => 'Accept: application/json, Authorization:  Bearer [Api Token]',
                    'params' => '',
                    'body' => '',
                    'end-point' => 'api/transactions/{id}',
                    'description' => 'description',
                ],
            ]
        ];
        return response()->json($end_points);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
