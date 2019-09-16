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
        $this->post('/api/customers', ['name'=> "Test Name"]);

        $this->assertCount(1, Customer::all());
    }
}
