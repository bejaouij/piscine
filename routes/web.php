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

Route::get('/', 'HomeController@welcome')->name('welcome');

/**
 * Static page routes.
 */
Route::get('/contact', function() {
    return view('pages.contact');
});

Route::get('/about', function() {
    return view('pages.about');
})

;Route::get('/shipping-information', function() {
    return view('pages.shipping-information');
});

Route::get('/payment-information', function() {
    return view('pages.payment-information');
});

Route::get('/legal-notice', function() {
    return view('pages.legal-notice');
});

/**
 * Lead to the product page with the product_id
 */
Route::get('/product/{id}', 'ProductController@show')->name('product');
/**
 * Lead to the products list related to the search keywords
 */
Route::post('/product', 'ProductController@showByKeywords')->name('product-search-keywords');
/**
 * Lead to the shop page with the shop_siret
 */
Route::get('/shop/{id}', 'ShopController@show')->where('id', '[0-9]+')->name("shop");
/**
 * Lead to the category page with the category_id
 */
Route::get('/category/{id}', 'CategoryController@show')->where('id', '[0-9]+');

/**
 * For testing purpose
 */

/**
 * Lead to a map with all reviews
 */
Route::get('/map', 'ShopController@map');

/**
 * Lead to geojson of shops
 */
Route::post('/map', 'ShopController@geojsonShops')->name('map');

/**
 * Lead to a review (for testing purpose)
 */
Route::get('/review/{customerId}/{productId}', 'ReviewController@show')->where('customerId', '[0-9]+')->where('productId', '[0-9]+');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'Auth\ProfileController@index')->name('profile_form');
Route::post('/profile', 'Auth\ProfileController@update')->name('profile_update');

Route::get('/my-shop/{id}', 'HomeController@shop')->name('my-shop');
Route::get('/my-shops', 'HomeController@shops')->name('my-shops');

Route::post('/product/create/shop/{id}', 'ProductController@add')->name('product-create');
