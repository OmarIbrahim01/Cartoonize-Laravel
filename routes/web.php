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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/who_we_are', [
    'as' => 'about.who_we_are',
    'uses' => 'AboutController@whoWeAre'
]);

Route::get('/contact_us', [
    'as' => 'about.contact_us',
    'uses' => 'AboutController@contactUs'
]);



// Designs Shop Routes

Route::get('/designs', [
    'as' => 'designs.index',
    'uses' => 'DesignsController@index'
]);

Route::get('/category/{category_id}', [
    'as' => 'designs.category',
    'uses' => 'DesignsController@category'
]);

Route::get('/category/{category_id}/{sub_category_id}', [
    'as' => 'designs.sub_category',
    'uses' => 'DesignsController@subCategory'
]);

Route::get('/designs/{id}', [
    'as' => 'designs.show',
    'uses' => 'DesignsController@show'
]);






/////////////////////////////////
////////Wishlist Routes/////////
///////////////////////////////

Route::get('/wishlist', [
    'as' => 'wishlist.index',
    'uses' => 'WishlistController@index'
]);

Route::get('/add_to_wishlist/{id}', [
    'as' => 'wishlist.store',
    'uses' => 'WishlistController@store'
]);

Route::get('/remove_from_wishlist/{id}', [
    'as' => 'wishlist.delete',
    'uses' => 'WishlistController@destroy'
]);





//Cart Routes
Route::get('/shopping_cart', [
    'as' => 'shopping_cart.show',
    'uses' => 'CartController@show'
]);

Route::get('/order_preferences', [
    'as' => 'shopping_cart.preferences',
    'uses' => 'CartController@preferences'
]);

Route::get('/order_review', [
    'as' => 'shopping_cart.review',
    'uses' => 'CartController@review'
]);






///////////////////////////////////
///////Add To Cart Routes/////////
/////////////////////////////////

Route::post('/add_design_to_cart/{design_id}', [
    'as' => 'addToCart.design',
    'uses' => 'OrderDesignsController@store'
]);

Route::post('/add_product_to_cart/{design_id}', [
    'as' => 'addToCart.product',
    'uses' => 'CartController@add_product_to_cart'
]);

Route::delete('/shopping_cart/remove_product_from_cart/{id}', [
    'as' => 'shopping_cart.delete_design_product',
    'uses' => 'CartController@remove_product_from_cart'
]);

Route::post('/add_user_image', [
    'as' => 'addToCart.add_user_image',
    'uses' => 'CartController@add_user_image'
]);

Route::delete('/delete_user_image/{id}', [
    'as' => 'addToCart.deleteUserImage',
    'uses' => 'CartController@delete_user_image'
]);

Route::delete('/clear_cart', [
    'as' => 'addToCart.deleteCart',
    'uses' => 'CartController@delete_cart'
]);

////////////////////////////////
////////Submit Cart////////////
//////////////////////////////

Route::post('/submit_cart_first_step', [
    'as' => 'SubmitCart.first',
    'uses' => 'CartController@submit_first'
]);

Route::post('/submit_cart_second_step', [
    'as' => 'SubmitCart.second',
    'uses' => 'CartController@submit_second'
]);

Route::post('/submit_cart_third_step', [
    'as' => 'SubmitCart.third',
    'uses' => 'CartController@submit_third'
]);



/////////////////////////////////////
/////////////My Orders//////////////
///////////////////////////////////

Route::get('/my_orders', [
    'as' => 'my_orders.index',
    'uses' => 'MyOrdersController@index'
]);

Route::get('/my_orders/{id}', [
    'as' => 'my_orders.show',
    'uses' => 'MyOrdersController@show'
]);


Route::group(['prefix' => 'sudo'], function () {
    Voyager::routes();
});