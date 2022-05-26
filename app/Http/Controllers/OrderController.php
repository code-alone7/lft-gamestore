<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('orders.list', [
            'orders' => Auth::user()->orders()->orderBy('updated_at', 'desc')->paginate(15),
        ]);
    }

    /**
     * Display an cart page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($orderID)
    {
        $order = Order::query()->with('games')->find($orderID);

        if ((Auth::user()->id !== $order->customer_id)) {
            return redirect()->route('home');
        }

        if ($order->getStatus() === config('orders.status_unpaid')) {
            return redirect()->route('cart');
        }

        return view('orders.show', [
            'order' => $order,
        ]);
    }

    /**
     * Display a cart page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        return view('orders.cart', [
            'order' => Auth::user()->currentOrder()->with('games')->first(),
        ]);
    }


    /**
     * Add game to current order.
     * 
     * @return \Illuminate\Http\Response
     */
    public function addGame(Game $game)
    {
        $order = Auth::user()->currentOrder()->firstOrCreate();

        if (!$order->games()->find($game->id)) {
            Auth::user()->currentOrder()->firstOrCreate()->games()->attach($game->id);
            return redirect()->back();
        }

        return redirect()->route('home');
    }


    /**
     * Remove game from current order.
     * 
     * @return \Illuminate\Http\Response
     */
    public function removeGame(Game $game)
    {
        $order = Auth::user()->currentOrder()->first();
        if (empty($order)) return redirect()->route('home');

        $order->games()->detach($game->id);
        if ($order->games()->count() === 0) {
            Auth::user()->deleteCurrentOrder();
        }
        return redirect()->back();
    }


    /**
     * Payment.
     * 
     * @return \Illuminate\Http\Response
     */
    public function processOrder()
    {
        $order = Auth::user()->currentOrder()->first();
        if ($order) {
            $order->setStatus(config('orders.status_paid'));
            return redirect()->route('home');
        }

        return redirect()->back();
    }
}
