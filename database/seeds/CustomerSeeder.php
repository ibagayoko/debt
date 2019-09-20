<?php

use App\Models\Account;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, 10)->create()->each(function($customer){
            $customer->accounts()->save(factory(Account::class)->make());
        });
    }
}
