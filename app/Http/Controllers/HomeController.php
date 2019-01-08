<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Product;
use Illuminate\Http\Request;

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
     * Show the current user shops.
     *
     * @return \Illuminate\Http\Response
     */
    public function shops() {
        return view('shop.my-shops');
    }
}
