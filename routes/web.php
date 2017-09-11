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

Route::get('/', 'HomeController@index')->name('home');
Route::resource('/sale', 'SaleController');
Route::resource('/sale_items', 'SaleItemController');
Route::resource('/order', 'OrderController');
Route::resource('/order_items', 'OrderItemController');
Route::resource('/payment', 'PaymentController');
Route::resource('/withdraw', 'WithdrawController');
Route::resource('/company', 'CompanyController');
Route::resource('/vendor', 'VendorController');
Route::resource('/product', 'ProductController');
Route::resource('/product/history', 'ProductHistoryController');
