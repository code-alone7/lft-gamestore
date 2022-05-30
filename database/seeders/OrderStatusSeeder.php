<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!OrderStatus::query()->where('title', config('orders.status_unpaid'))->first()) {
            OrderStatus::create(['title' => config('orders.status_unpaid')]);
        }
        if (!OrderStatus::query()->where('title', config('orders.status_paid'))->first()) {
            OrderStatus::create(['title' => config('orders.status_paid')]);
        }
        if (!OrderStatus::query()->where('title', config('orders.status_canceled'))->first()) {
            OrderStatus::create(['title' => config('orders.status_canceled')]);
        }
    }
}
