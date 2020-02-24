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

Route::get('/', 'ListingsController@index');

Auth::routes();

Route::resource('listings', 'ListingsController');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create_order', 'OrdersController@create');

 Route::get('/orders', 'OrdersController@index'); ////1111 for datatable
 Route::get('/orders-list', 'OrdersController@ordersList'); ////2222 for datatable

Route::resource('orders', 'OrdersController');
Route::resource('agent', 'AgentsController');
Route::resource('location', 'LocationsController');

 //wallet+sales
 Route::get('/wallet/{id}', 'LocationsController@wallet');
 Route::get('/index_wallet', 'LocationsController@indexWallet');
 Route::post('/make', 'LocationsController@record');
 Route::get('/drawer', 'LocationsController@drawer');
 Route::post('/post_drawer', 'LocationsController@post_drawer');
 Route::get('/location/{id}/up','LocationsController@wallet');
