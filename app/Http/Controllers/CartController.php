<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
    	$cartItems = Cart::where('customer_id', Auth::user()->user_id)->get();

    	return view('cart', compact(['cartItems']));
    }

    /**
     * Show the page for the basket of an user
     *
     * Get products from the database if the user is connected
     * If not, search for a basket in the cookies
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show()
    {

        if (Auth::check()) {

            $baskets = Cart::all()->where('customer_id', Auth::user()->user_id);

        } else {

            // get Basket form the cookies
            $baskets = [];

        }

        return view('cart.show', ['baskets' => $baskets]);

    }

}