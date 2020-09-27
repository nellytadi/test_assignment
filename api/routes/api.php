<?php

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


Route::post('accounts', 'AccountController@store');

Route::get('accounts/{id}', 'AccountController@show');

Route::get('accounts/{id}/transactions', 'TransactionController@showTransactions');

Route::post('accounts/{id}/transactions', 'TransactionController@storeTransactions');

Route::get('currencies', 'CurrencyController@showCurrencies');