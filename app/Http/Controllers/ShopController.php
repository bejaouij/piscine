<?php
/**
 * Created by PhpStorm.
 * User: tangu
 * Date: 09/12/2018
 * Time: 16:35
 */

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\View\View;

class ShopController extends Controller
{

    /**
     * Show the page of the product identified by id
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show(int $id)
    {
        return view('shop.show', ['shop' => Shop::findOrFail($id)]);
    }

}