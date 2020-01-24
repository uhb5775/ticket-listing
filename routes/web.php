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
Route::post('pdf_form', 'PdfController@pdfForm');
 Route::post('pdf_download', 'PdfController@pdfDownload');


Route::get('/order', 'ListingsController@test');
Route::get('/create_order', 'OrdersController@create');

 Route::get('/orders', 'OrdersController@index'); ////1111
 Route::resource('orders', 'OrdersController');

//  Route::get('/agent', 'AgentsController@index');
 Route::resource('agent', 'AgentsController');

 Route::get('/orders-list', 'OrdersController@ordersList'); ////2222





