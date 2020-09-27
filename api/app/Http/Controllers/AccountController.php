<?php

namespace App\Http\Controllers;

use App\Account;

use App\Http\Requests\StoreAccount;

class AccountController extends Controller
{
    public function show($id)
    {
        $account = Account::find($id);

        return response()->json([$account, "message" => "Success"],200);
    }

    public function store(StoreAccount $request)
    {
        $request = $request->validated();

        $account = Account::create([
            'name' => $request['name'],
            'balance' => $request['balance']
        ]);

        return response()->json([$account, "message" => "Created successfully"],201);
    }


}
