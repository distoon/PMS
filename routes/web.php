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
Route::group(['middleware'=>'auth'],function(){
  Route::get('/clear-cache', function() {
      Artisan::call('cache:clear');
      return "Cache is cleared";
  });
  Route::get('/','HomeController@index');
  Route::get('/home', 'HomeController@index')->name('home');
  Route::group(['middleware'=>'admin'],function(){
    Route::get('/product/create','ProductController\ProductController@create')->name('product.create');
    Route::post('/product/store','ProductController\ProductController@store')->name('product.store');
    Route::get('/product/all','ProductController\ProductController@index')->name('product.all');
    Route::get('/product/show/{id}','ProductController\ProductController@show')->name('product.show');
    Route::get('/product/edit/{id}','ProductController\ProductController@edit')->name('product.edit');
    Route::post('/product/update/{id}','ProductController\ProductController@update')->name('product.update');
    Route::post('/product/delete','ProductController\ProductController@destroy')->name('product.delete');
    Route::get('/order/all','OrderController\OrderController@index')->name('order.all');
  });
  Route::get('/order/edit/{id}','OrderController\OrderController@edit')->name('order.edit');
  Route::post('/order/upudate/{id}','OrderController\OrderController@update')->name('order.update');
  Route::get('/order/show/{id}','OrderController\OrderController@show')->name('order.show');
  Route::get('/order/state/{id}','OrderController\OrderController@state')->name('order.state');
  Route::post('/order/delete','OrderController\OrderController@destroy')->name('order.delete');
  Route::get('/order/create','OrderController\OrderController@create')->name('order.create');
  Route::post('/order/store','OrderController\OrderController@store')->name('order.store');
  Route::get('/order/myOrders','OrderController\OrderController@myOrders')->name('order.myOrders');
  Route::get('/order/report','OrderController\OrderController@report')->name('order.report');
});
