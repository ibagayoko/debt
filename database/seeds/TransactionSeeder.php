<?php

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accts = Account::all();

        foreach ($accts as $key => $account) {
            $account->transactions()->save(factory(Transaction::class)->make());
            $account->transactions()->save(factory(Transaction::class)->make());
            $account->transactions()->save(factory(Transaction::class)->make());
        }
    }
}
