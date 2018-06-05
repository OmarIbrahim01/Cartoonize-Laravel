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




Route::group(['prefix' => 'sudo'], function () {
    Voyager::routes();
});
