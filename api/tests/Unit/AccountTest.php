<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Account;

class AccountTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAccountCreation()
    {
        $account = factory(Account::class)->create()->toArray();

        $this->json('POST', 'api/accounts', $account, ['Accept' => 'application/json'])
            ->assertJson(["message" => "Created successfully"])
            ->assertJsonMissingValidationErrors(["name","balance"])
            ->assertJsonCount(2)
            ->assertStatus(201);

        $this->assertDatabaseHas('accounts', [
            'name' => $account['name'],
            'balance' => $account['balance']
        ]);

    }

    public function testFetchingAccountDetails()
    {
        $account = factory(Account::class)->create()->toArray();

        $url = "api/accounts/{$account['id']}";
        $this->json('GET', $url)
            ->assertJson([$account, "message" => "Success"])
            ->assertStatus(200);
    }


}
