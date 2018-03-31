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

Route::get('/', 'DistributorController@index')->name('product');
Route::post('addproduct', 'DistributorController@addproduct')->name('addproduct');
Route::post('editproduct', 'DistributorController@editproduct')->name('editproduct');
Route::post('deleteproduct', 'DistributorController@deleteproduct')->name('deleteproduct');
Route::post('searchproduct', 'DistributorController@searchproduct')->name('searchproduct');

Route::get('/location', 'DistributorController@location')->name('location');
Route::get('/order', 'DistributorController@order')->name('order');