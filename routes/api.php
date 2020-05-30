<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/category', 'CategoryController@index');
Route::get('/category/{id?}', 'CategoryController@getId');
Route::post('/category/create', 'CategoryController@store');
Route::post('/category/update', 'CategoryController@update');
Route::delete('/category/{id?}', 'CategoryController@delete');
Route::get('/product', 'ProductController@index');
Route::post('/product/create', 'ProductController@store');
Route::post('/product/update', 'ProductController@update');
Route::delete('/product/{id?}', 'ProductController@delete');
Route::get('/customer', 'CustomerController@index');
Route::post('/customer/login', 'CustomerController@login');
Route::post('/customer/create', 'CustomerController@store');
Route::post('/customer/update', 'CustomerController@update');
Route::delete('/customer/{id?}', 'CustomerController@delete');
Route::get('/transaction', 'TransactionController@index');
Route::get('/transaction/{id?}', 'TransactionController@getId');
Route::post('/transaction/create', 'TransactionController@store');
Route::post('/transaction/update', 'TransactionController@update');
Route::delete('/transaction/{id?}', 'TransactionController@delete');
