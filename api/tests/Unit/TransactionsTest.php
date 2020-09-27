<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Account;
use App\Transaction;

class TransactionsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testTransactionCreation()
    {
        $this->seed();

        $account = factory(Account::class)->create()->toArray();

        $transaction = factory(Transaction::class)->create()->toArray();

        $url = "api/accounts/{$account['id']}/transactions";

        $this->json('POST', $url, $transaction, ['Accept' => 'application/json'])
            ->assertJson(['message' => 'Transfer successful'])
            ->assertJsonMissingValidationErrors(["from", "to", "details", "amount"])
            ->assertStatus(201);

        $this->assertDatabaseHas('transactions', [
            'from' => $transaction['from'],
            'to' => $transaction['to'],
            'details' => $transaction['details'],
            'amount' => $transaction['amount']
        ]);

    }

    public function testFetchingTransactionDetails()
    {
        $this->seed();

        $account = factory(Account::class)->create()->toArray();

        $url = "api/accounts/{$account['id']}/transactions";
        $this->call('GET', $url)
            ->assertJson(["message" => "Success"])
            ->assertStatus(200);
    }
}
