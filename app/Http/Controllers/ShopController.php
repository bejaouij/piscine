<?php

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
            $content .= $shop->shop_siret;
            $content .= '"} },';
        }

        $content = substr($content, 0, -1);

        echo $content . ']}';
    }

}