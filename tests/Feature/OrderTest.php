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

    public function test_users_current_order()
    {
        $user = User::factory()->create();
        $order = $user->currentOrderOrCreate();

        $this->assertNotEmpty($user->currentOrderOrCreate());
        $this->assertEquals($order->id, $user->currentOrderOrCreate()->id);
    }

    public function test_users_isCrrentOrder_work()
    {
        $user = User::factory()->create();

        $this->assertFalse($user->hasCurrentOrder());

        $user->currentOrderOrCreate();

        $this->assertTrue($user->hasCurrentOrder());
    }

    public function test_current_order_deletion()
    {
        $user = User::factory()->create();

        $this->assertFalse($user->hasCurrentOrder());

        $user->currentOrderOrCreate();

        $this->assertTrue($user->hasCurrentOrder());

        $user->deleteCurrentOrder();

        $this->assertFalse($user->hasCurrentOrder());
    }

    protected $seed = true;
}
