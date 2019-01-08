<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Leading;
use App\Address;
use App\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    /**
     * Show the page of the product identified by id
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($id)
    {
        return view('shop.show', ['shop' => Shop::findOrFail($id)]);
    }

    /**
     * Fonction de test
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function map()
    {
        return view('shop.map');
    }

    /**
     * Generate GeoJson code of all shops
     */
    public function geojsonShops()
    {
        $shops = Shop::all();
        $content = '{ "type": "FeatureCollection", "features":[ ';

        foreach ($shops as $shop) {
            $content .= '{"type":"Feature", "geometry": {"type":"Point", "coordinates": [';

            $content .=  $shop->shop_position_y;
            $content .= ', ';
            $content .= $shop->shop_position_x;
            $content .= ']}, "properties": {"name": "';
            $content .= $shop->shop_name;
            $content .= '", "siret":"';
            $content .= $shop->shop_siret;
            $content .= '"} },';
        }

        $content = substr($content, 0, -1);

        echo $content . ']}';
    }

    public function create(Request $request) {
        $newAddress = new Address();
        $newAddress->address_street_number = $request->address_street_number;
        $newAddress->address_street = $request->address_street;
        $newAddress->address_city = $request->address_city;
        $newAddress->address_postal_code = $request->address_postal_code;
        $newAddress->save();

        $newShop = new Shop();
        $newShop->shop_siret = $request->shop_siret;
        $newShop->shop_name = $request->shop_name;
        $newShop->shop_contact_mail = $request->shop_contact_mail;
        $newShop->shop_phone = $request->shop_phone;
        $newShop->shop_is_delivery_possible = ($request->shop_is_delivery_possible == '0') ? false : true;
        $newShop->address_id = $newAddress->address_id;
        $newShop->save();

        $newLeading = new Leading();
        $newLeading->shop_siret = $newShop->shop_siret;
        $newLeading->user_id = Auth::user()->user_id;
        $newLeading->save();

        return redirect()->back();
    }

    public function readByCategory($id) {
        return view('product.list', ['products' => Product::where('category_id', $id)->get()]);
    }
}