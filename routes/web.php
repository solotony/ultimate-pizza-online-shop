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

Route::get('/welcome/', function () {
    return view('welcome');
});

Route::get('/', ['uses'=>'FrontController@front', 'as'=>'front_page']);
Route::get('/{category_id}/', ['uses'=>'FrontController@category', 'as'=>'category_page']);
Route::get('/{category_id}/{unit_id}/', ['uses'=>'FrontController@product', 'as'=>'product_page']);

// AJAX METHODS
Route::post('/cart/add/{unit_id}/',                     ['uses'=>'CartController@cart_add', 'as'=>'cart_add']);
Route::post('/cart/increment/{item_id}/',               ['uses'=>'CartController@delete', 'as'=>'cart_increment']);
Route::post('/cart/decrement/{item_id}/',               ['uses'=>'CartController@delete', 'as'=>'cart_decrement']);
Route::post('/cart/set/{item_id}/',                     ['uses'=>'CartController@rem', 'as'=>'cart_set']);
Route::get('/cart/show/',                               ['uses'=>'CartController@show', 'as'=>'cart_show']);

// NORMAL METHODS
Route::post('/cart/clear/',                             ['uses'=>'CartController@clear', 'as'=>'cart_clear']);
Route::get('/cart/cart/',                               ['uses'=>'CartController@cart', 'as'=>'cart']);
Route::post('/cart/checkout/',                          ['uses'=>'CartController@checkout', 'as'=>'cart_checkout']);
Route::post('/cart/finish/',                            ['uses'=>'CartController@finish', 'as'=>'cart_finish']);
