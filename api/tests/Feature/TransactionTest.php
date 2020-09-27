<?php

namespace Tests\Feature;

use App\Transaction;
use App\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIfAmountIsGreaterThanAccountBalanceItReturnsFail()
    {
        $this->seed();

        $account = factory(Account::class)->create()->toArray();
        $url = "api/accounts/{$account['id']}/transactions";


        $transaction = factory(Transaction::class)->create([
            "amount" => $account['balance'] + 1000
        ])->toArray();


        $this->json('POST', $url, $transaction, ['Accept' => 'application/json'])
            ->assertJson(['message' => 'Your Account Balance is insufficient'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('transactions',$transaction);
    }


}
