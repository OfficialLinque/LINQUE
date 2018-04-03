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


Auth::routes(); 

Route::get('/', 'DistributorController@index')->name('dhome');
Route::post('product/{option}', 'DistributorController@product')->name('product');
Route::post('addproduct', 'DistributorController@addproduct')->name('addproduct');
Route::get('editproduct', 'DistributorController@editproduct')->name('editproduct');
Route::post('editproduct1', 'DistributorController@editproduct1')->name('editproduct1');
Route::get('deleteproduct', 'DistributorController@deleteproduct')->name('deleteproduct');
Route::get('deletePackage', 'DistributorController@deletePackage')->name('deletePackage');
Route::post('searchproduct', 'DistributorController@searchproduct')->name('searchproduct');

Route::get('data/product', 'DistributorController@get')->name('get_product');
Route::get('/location', 'DistributorController@location')->name('location');
Route::get('/order', 'DistributorController@order')->name('order');
    
Route::get('/purchase', 'RetailController@purchase')->name('rhome');
Route::get('/cart', 'RetailController@cart')->name('cart');
Route::get('/checkout', 'RetailController@checkout')->name('checkout');

Route::get('/transaction', 'RetailController@transaction')->name('transaction');
Route::get('/gettransaction', 'TransactionController@get')->name('get_transaction');

Route::get('/rlocation', 'RetailController@rlocation')->name('rlocation');
Route::post('/cart/{option}', 'CartController@cart')->name('cart_crud');   








