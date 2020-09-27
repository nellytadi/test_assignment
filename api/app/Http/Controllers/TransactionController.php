<?php

namespace App\Http\Controllers;
use App\Account;
use App\Http\Requests\StoreTransaction;
use App\Transaction;
use App\Http\Resources\TransactionCollection;

class TransactionController extends Controller
{
    public function showTransactions($id)
    {
        $transaction = Transaction::where('from', $id)->orWhere('to', $id)->get();

        return response()->json([new TransactionCollection($transaction), "message" => "Success"],200);
    }

    public function storeTransactions(StoreTransaction $request, $id)
    {

        $request = $request->validated();

        $to = $request['to'];
        $amount = $request['amount'];
        $details = $request['details'];

        $account = Account::find($id);

        if ($amount <= $account->balance) {

            $account->balance = $account->balance - $amount;
            $account->save();

            $account_to = Account::find($to);
            $account_to->balance = $account_to->balance + $amount;
            $account_to->save();

            Transaction::create([
                'from' => $id,
                'to' => $to,
                'amount' => $amount,
                'details' => $details
            ]);

            return response()->json(['message' => 'Transfer successful'], 201);
        }
        return response()->json(['message' => 'Your Account Balance is insufficient'], 403);

    }
}
