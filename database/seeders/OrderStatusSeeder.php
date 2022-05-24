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
        OrderStatus::create(['title' => config('orders.status_unpaid')]);
        OrderStatus::create(['title' => config('orders.status_paid')]);
        OrderStatus::create(['title' => config('orders.status_canceled')]);
    }
}
