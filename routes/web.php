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

Route::get('/', ['uses'=>'FrontController@front', 'as'=>'front_page']);
Route::get('/{category_id}/', ['uses'=>'FrontController@category', 'as'=>'category_page']);
Route::get('/{category_id}/{product_id}/', ['uses'=>'FrontController@product', 'as'=>'product_page']);
