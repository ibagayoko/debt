<?php

namespace Tests\Feature;

use App\Models\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_customer_can_be_add()
    {
        $this->withoutExceptionHandling();
        $this->create();
        $this->assertCount(1, Customer::all());
    }

    /** @test */
    public function can_get_customer()
    {
        $this->withoutExceptionHandling();
        $this->create();
        $cus = $this->get('/api/customers/1')->json();//->assertJson($this->customerData());
        $customer = Customer::find(1)->toArray();
        $this->assertEquals($cus, $customer);

        // dd($cus);
    }

    /** @test */
    public function can_update_customer()
    {
        $this->withoutExceptionHandling();
        $this->create();
        $cus = $this->put('/api/customers/1', ['name' => 'New Name']);
        // $this->assertCount(1, Customer::all());
        $customer = Customer::find(1);
        $this->assertEquals($customer->name, "New Name");
    }

    /** @test */
    public function can_delete_customer()
    {
        $this->withoutExceptionHandling();
        $this->create();
        $this->delete('/api/customers/1');
        $this->assertCount(0, Customer::all());
    }

    private function customerData(){
        return ['name'=> "Test Name", 'email'=>'trtdf@nmnnk.gg'];
    }
    private function create()
    {
        $this->post('/api/customers', $this->customerData());

    }


}
