<?php

namespace App\Http\Controllers;

use App\Basket;

class BasketController extends Controller
{

    /**
     * Show the page for the basket of an user
     *
     * Get products from the database if the user is connected
     * If not, search for a basket in the cookies
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show() {


        return view();

    }

}