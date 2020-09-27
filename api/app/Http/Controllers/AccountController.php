<?php

namespace App\Http\Controllers;

use App\Account;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show($id)
    {
        $account = Account::find($id);

        return response()->json([$account, "message" => "Success"],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'balance' => 'required|numeric|min:0|not_in:0',
        ]);
        $account = Account::create([
            'name' => $request->input('name'),
            'balance' => $request->input('balance')
        ]);

        return response()->json([$account, "message" => "Created successfully"],201);
    }


}
