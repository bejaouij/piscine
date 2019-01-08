<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Copy;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $baskets = Cart::where('customer_id', Auth::user()->user_id)->get();
        $itemSummaries = [];

        $sum = 0;

        foreach ($baskets as $cartItem) {
            $cartCopy = Copy::find($cartItem->copy_id);
            $cartProduct = Product::find($cartCopy->product_id);

            $itemSummaries[] = [
                'cart_copy' => $cartCopy,
                'cart_product' => $cartProduct,
                'cart_quantity' => $cartItem->cart_quantity,
                'cart_sumn' => $cartProduct->getDiscountedPrice() * $cartItem->cart_quantity
            ];

            $sum += $cartProduct->getDiscountedPrice() * $cartItem->cart_quantity;
        }

        return view('cart.show', compact(['itemSummaries', 'baskets', 'sum']));
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

            $baskets = Cart::all()->where('customer_id', Auth::user()->user_id)->get();

        } else {

            // get Basket form the cookies
            $baskets = [];

        }

        return view('cart.show', ['baskets' => $baskets]);

    }

    public function delete($id)
    {
        $basket = Cart::where('customer_id', Auth::user()->user_id)->where('copy_id', $id)->get();
        if (isset($basket[0])) {
            $basket[0]->delete();
        }

        return redirect()->route('cart-index');
    }

    public function add($id, $quantity)
    {

        $basket = Cart::where('customer_id', Auth::user()->user_id)->where('copy_id', $id)->get();
        if (isset($basket[0])) {
            $basket = $basket[0];
            $basket->cart_quantity += $quantity;
        } else {
            $basket = new Cart([
                'copy_id' => $id,
                'customer_id' => Auth::user()->user_id,
                'cart_quantity' => $quantity
            ]);
            $basket->copy_id = $id;
            $basket->customer_id = Auth::user()->user_id;
            $basket->cart_quantity = $quantity;
        }
        $basket->save();

        dump($basket);

        //return redirect()->back();
    }

}