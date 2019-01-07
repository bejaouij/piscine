<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;

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

    /**
     * Return a page with all keyword related products.
     *
     * @param String, Illuminate\Http\Request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function showByKeywords(Request $request) {
        return view('product.list', ['products' => Product::like('product_name', $request->keywords)]);
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

    /**
     * Get a list of product from the category indentified by id
     *
     * @param int $id
     * @return View
     */
    public function compareList(int $id)
    {
        $products = Product::where('category_id', $id)->get();
        return view('product.list', ["products" => $products]);
    }

    public function add(Request $request, $id) {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:50',
            'product_booking_duration' => 'integer',
            'product_price' => 'required',
            'product_discount_percentage' => 'min:0|max:100',
            'category_id' => 'required|integer',
        ]);

        // TODO
        // Vérifier l'existence de la catégorie et du magasin.
        // Vérifier le type des champs.

        $newProduct = new Product();
        $newProduct->product_name = $request->product_name;
        $newProduct->product_booking_duration = $request->product_booking_duration;
        $newProduct->product_price = $request->product_price;
        $newProduct->product_discount_percentage = number_format(($request->product_discount_percentage / 100), '2', '.', '');
        $newProduct->category_id = $request->category_id;
        $newProduct->shop_siret = $id;
        $newProduct->save();

        return redirect()->back();
    }
}