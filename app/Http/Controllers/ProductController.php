<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{

    /**
     * Show the page of the product identified by id
     *
     * @param int $id
     * @return View
     */
    public function show($id) {
        return view('product.show', ['product' => Product::findOrFail($id)]);
    }

}