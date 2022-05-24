<?php

namespace App\Observers;

use App\Exceptions\CurrentOrderExist;
use App\Models\Order;
use App\Models\OrderStatus;

class OrderObserver
{
    /**
     * Handle the Order "creating" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function creating(Order $order)
    {
        $currentOrder = $order->customer->orders()->unpaid()->first();

        if ($currentOrder) {
            throw new CurrentOrderExist('This user already has upaid order');
        }

        $order->order_status_id = OrderStatus::query()->where('title', 'unpaid')->first()->id;
    }
}
