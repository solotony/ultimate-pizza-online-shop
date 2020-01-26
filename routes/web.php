<?php

use \Illuminate\Support\Facades\Route;

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

Route::post('/login/',                                  ['uses'=>'Auth\LoginController@login', 'as'=>'login']);
Route::post('/logout/',                                 ['uses'=>'Auth\LoginController@logout', 'as'=>'logout']);

Route::get('/home/',                                    ['uses'=>'FrontController@home', 'as'=>'home'])->middleware('auth');
Route::get('/order/{order_id}/',                        ['uses'=>'FrontController@home_order', 'as'=>'home_order'])->where('order_id', '[0-9]+')->middleware('auth');

// AJAX METHODS
Route::post('/cart/add/{unit_id}/',                     ['uses'=>'CartController@add', 'as'=>'cart_add']);
Route::post('/cart/inc/{item_id}/',                     ['uses'=>'CartController@inc', 'as'=>'cart_inc']);
Route::post('/cart/dec/{item_id}/',                     ['uses'=>'CartController@dec', 'as'=>'cart_dec']);
Route::post('/cart/set/{item_id}/',                     ['uses'=>'CartController@set', 'as'=>'cart_set']);
Route::get('/cart/show/',                               ['uses'=>'CartController@show', 'as'=>'cart_show']);
Route::get('/cart/product/{proruct_id}/',               ['uses'=>'CartController@product', 'as'=>'cart_product']);
Route::get('/cart/currency/',                           ['uses'=>'CartController@currency', 'as'=>'cart_currency']);

// NORMAL METHODS
Route::post('/cart/clear/',                             ['uses'=>'CartController@clear', 'as'=>'cart_clear']);
Route::post('/cart/checkout/',                          ['uses'=>'CartController@checkout', 'as'=>'cart_checkout']);
Route::get('/cart/checkout/',                           ['uses'=>'CartController@checkout', 'as'=>'cart_checkout']);
Route::post('/cart/finish/',                            ['uses'=>'CartController@finish', 'as'=>'cart_finish']);
Route::get('/cart/',                                    ['uses'=>'CartController@cart', 'as'=>'cart']);
Route::post('/order/',                                  ['uses'=>'CartController@show_order', 'as'=>'show_order']);


Route::get('/', ['uses'=>'FrontController@front', 'as'=>'front_page']);
Route::get('/{category_id}/', ['uses'=>'FrontController@category', 'as'=>'category_page'])->where('category_id', '[0-9]+');
Route::get('/{category_id}/{unit_id}/', ['uses'=>'FrontController@product', 'as'=>'product_page'])->where('category_id', '[0-9]+')->where('unit_id', '[0-9]+');
Route::post('/set_currency/', ['uses'=>'FrontController@set_currency', 'as'=>'set_currency']);
