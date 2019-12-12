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

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product/create','ProductController\ProductController@create')->name('product.create');
Route::post('/product/store','ProductController\ProductController@store')->name('product.store');
Route::get('/product/all','ProductController\ProductController@index')->name('product.all');
Route::get('/product/show/{id}','ProductController\ProductController@show')->name('product.show');
Route::get('/product/edit/{id}','ProductController\ProductController@edit')->name('product.edit');
Route::post('/product/update/{id}','ProductController\ProductController@update')->name('product.update');
Route::post('/product/delete','ProductController\ProductController@destroy')->name('product.delete');
