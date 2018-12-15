<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * Lead to the product page with the product_id
 */
Route::get('/product/{id}', 'ProductController@show')->where('id', '[0-9]+');
/**
 * Lead to the shop page with the shop_siret
 */
Route::get('/shop/{id}', 'ShopController@show')->where('id', '[0-9]+');
/**
 * Lead to the category page with the category_id
 */
Route::get('/category/{id}', 'CategoryController@show')->where('id', '[0-9]+');
/**
 * Lead to the basket
 */
Route::get('/basket', 'BasketController@show');




/**
 * For testing purpose
 */

/**
 * Lead to a review (for testing purpose)
 */
Route::get('/review/{customerId}/{productId}', 'ReviewController@show')->where('customerId', '[0-9]+')->where('productId', '[0-9]+');