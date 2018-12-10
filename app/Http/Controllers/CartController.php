<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Copy;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
    	$cartItems = Cart::where('customer_id', Auth::user()->user_id)->get();
    	$itemSummaries = [];

    	foreach($cartItems as $cartItem) {
    		$cartCopy = Copy::find($cartItem->copy_id);
    		$cartProduct = Product::find($cartCopy->product_id);

    		$itemSummaries[] = [
    			'cart_copy' => $cartCopy,
    			'cart_product' => $cartProduct,
    			'cart_quantity' => $cartItem->cart_quantity
    		];
    	}

    	return view('cart', compact(['itemSummaries']));
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