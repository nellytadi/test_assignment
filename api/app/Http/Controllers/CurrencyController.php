<?php

namespace App\Http\Controllers;

use App\Currency;
//use Illuminate\Http\Request;


class CurrencyController extends Controller
{
    public function showCurrencies()
    {
        $currency = Currency::all();

        return $currency;
    }
}
