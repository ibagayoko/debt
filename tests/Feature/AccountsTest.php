<?php

namespace Tests\Feature;

use App\Models\Account;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_account_can_be_add()
    {
        $this->withoutExceptionHandling();
        $this->create();
        $this->assertCount(1, Account::all());
    }

    /** @test */
    public function can_get_customer()
    {
        $this->withoutExceptionHandling();
        $this->create();
        $cus = $this->get('/api/accounts/1')->json();//->assertJson($this->customerData());
        $account = Account::find(1)->toArray();
        $this->assertEquals($cus, $account);

        // dd($account);
    }

    /** @test */
    public function can_update_account()
    {
        $this->withoutExceptionHandling();
        $this->create();
        $cus = $this->put('/api/accounts/1', ['amount' => 20]);
        // $this->assertCount(1, Customer::all());
        $account = Account::find(1);
        // dd($account);
        $this->assertEquals($account->amount, 20);
    }

    /** @test */
    public function can_delete_account()
    {
        $this->withoutExceptionHandling();
        $this->create();
        $this->delete('/api/accounts/1');
        $this->assertCount(0, Account::all());
    }

    private function accountData(){
        return ['amount'=> 10, 'customer_id'=>1, 'description'=>'t dhjd hdg'];
    }

    private function customerData(){
        return ['name'=> "Test Name", 'email'=>'trtdf@nmnnk.gg'];
    }
    private function create()
    {
        $this->createCustomer();
        $this->post('/api/accounts', $this->accountData());

    }

    private function createCustomer()
    {
        $this->post('/api/customers', $this->customerData());

    }
}
