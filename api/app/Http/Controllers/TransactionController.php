<?php

namespace App\Http\Controllers;
use App\Account;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showTransactions($id)
    {
        $transaction = Transaction::where('from', $id)->orWhere('to', $id)->get();

        return response()->json([$transaction, "message" => "Success"],200);
    }

    public function storeTransactions(Request $request, $id)
    {
        $this->validate($request, [
            'to' => 'required|integer|exists:accounts,id',
            'amount' => 'required|numeric|min:0|not_in:0',
            'details' => 'required|min:5',
        ]);

        $to = $request->input('to');
        $amount = $request->input('amount');
        $details = $request->input('details');

        $account = Account::find($id);

        if ($amount < $account->balance) {

            $account->balance = $account->balance - $amount;
            $account->save();

            $account_to = Account::find($to);
            $account_to->balance = $account_to->balance + $amount;
            $account_to->save();

            $transaction = Transaction::create([
                'from' => $id,
                'to' => $to,
                'amount' => $amount,
                'details' => $details
            ]);

            return response()->json([$transaction,'message' => 'Transfer successful'], 201);
        }
        return response()->json(['message' => 'Your Account Balance is insufficient'], 403);

    }
}
