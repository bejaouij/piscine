<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Leading;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show website home
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome() {
        return view('welcome', ['shops' => Shop::all(), 'bestSellers' => Product::getBestSellers()]);
    }

    /**
     * Show the specified user shop.
     *
     * @param: String
     * @return \Illuminate\Http\Response
     */
    public function shop($id) {;

        if(Leading::where('shop_siret', $id)->firstOrFail()->user_id === Auth::user()->user_id)
            return view('shop.my-shop', ['shop' => Shop::findOrFail($id), 'categories' => Category::all()]);

        abort(404);
    }

    /**
     * Show the current user shops.
     *
     * @return \Illuminate\Http\Response
     */
    public function shops() {
        return view('shop.my-shops');
    }
}
