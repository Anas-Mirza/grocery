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

Route::get('/', 'OrderController@index')->name('orders');
Route::get('/{id}','OrderController@show')->name('show_order');
Route::get('{id}/additem','ItemsController@index')->name('add_order_items');
Route::post('/createorder','OrderController@create')->name('create_order');
Route::put('/freezeorder/{id}','OrderController@update')->name('freeze_order');
Route::post('/itemcreate','ItemsController@create')->name('create_item');

