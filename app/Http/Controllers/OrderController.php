<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    /**
     * OrderController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the detailed view of an order identified by id
     *
     * Only show the page to:
     *  - an admin,
     *  - a leader of the shop,
     *  - the customer from the order
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $customer = $order->customer;
        $leaders = $order->getShop()->leaders();

        return view('order.show', ['order' => $order]);
    }

    /**
     * Show all the orders from the connected user
     *
     * If the user is not connected, ask for auth
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAll()
    {
        $id = Auth::id();
        $orders = Order::where('customer_id', $id);
        return view('order.all', ['orders' => $orders]);
    }

    /**
     * Create an order with all the copies from the cart
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function order()
    {
        $order = new Order();
        return view('order.show', ['order' => $order]);
    }

}