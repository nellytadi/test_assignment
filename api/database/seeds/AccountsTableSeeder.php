<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'name' => 'John',
            'balance' => 15000,
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' =>date("Y/m/d H:i:s")
        ]);

        DB::table('accounts')->insert([
            'name' => 'Peter',
            'balance' => 100000,
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' =>date("Y/m/d H:i:s")
        ]);
    }
}
