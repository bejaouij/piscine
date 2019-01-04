<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\View\View;

class ProductController extends Controller
{

    /**
     * Show the page of the product identified by id
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show(int $id)
    {
        return view('product.show', ['product' => Product::findOrFail($id)]);
    }

    public function comparator(int $product_id_1, int $product_id_2)
    {
        return view('product.comparator',
        [
            'product1' => Product::findOrFail($product_id_1),
            'product2' => Product::findOrFail($product_id_2)
        ]);
    }

    /**
     * Show the page to update a product identified by id
     *
     * @param $id
     * @return View
     */
    public function update(int $id)
    {
        return view('product.update', ['action' => 'update', 'product' => Product::findOrFail($id)]);
    }

    /**
     * Handle the update of a product identified by id
     *
     * @param $id
     */
    public function updated(int $id)
    {

    }

    /**
     * Show the page to create a new product
     * @return View
     */
    public function create()
    {
        return view('product.update', ['action' => 'create']);
    }


    /**
     * Handle the creation of a new product
     */
    public function created()
    {

    }

    /**
     * Delete the product identified by id
     *
     * @param $id
     */
    public function delete(int $id)
    {

    }

}