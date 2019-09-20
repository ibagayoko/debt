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

// Route::post('customers', "CustomerController@index");
// Route::get('customers/{id}', "CustomerController@show");
// Route::put('customers/{id}', "CustomerController@update");
// Route::delete('customers/{id}', "CustomerController@destroy");

Route::apiResource('customers', "CustomerController");
Route::apiResource('accounts', "AccountController");
Route::apiResource('transactions', "TransactionController");