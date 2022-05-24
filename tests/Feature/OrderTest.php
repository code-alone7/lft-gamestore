<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_resations_work()
    {
        $user = User::factory()->create();

        $order = Order::create([
            'customer_id' => $user->id,
            'order_status_id' => 1,
        ]);

        $this->assertNotEmpty($order);
        $this->assertNotEmpty($order->customer);
        $this->assertNotEmpty($user->orders->first());
    }

    protected $seed = true;
}
