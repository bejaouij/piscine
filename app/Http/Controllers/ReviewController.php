<?php

namespace App\Http\Controllers;


use App\Review;

class ReviewController extends Controller
{

    public function show($customerId, $productId)
    {
        $shop = Review::find(
                ['customer_id' => $customerId,
                'product_id' => $productId]);
        dump($shop);
    }

}