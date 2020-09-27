<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Resources\Account as AccountResource;
use App\Http\Requests\StoreAccount;

class AccountController extends Controller
{
    public function show($id)
    {
        $account = Account::find($id);

        return response()->json([new AccountResource($account), "message" => "Success"],200);
    }

    public function store(StoreAccount $request)
    {
        $request = $request->validated();

        $account = Account::create([
            'name' => $request['name'],
            'balance' => $request['balance']
        ]);

        return response()->json([new AccountResource($account), "message" => "Created successfully"],201);
    }


}
