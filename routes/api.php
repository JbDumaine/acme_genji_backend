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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Suppliers routes
Route::get('/suppliers', 'SupplierController@getAll');
Route::get('/suppliers/{id}', 'SupplierController@get');
Route::post('/suppliers', 'SupplierController@create');
Route::put('/suppliers/{id}', 'SupplierController@update');
Route::delete('/suppliers/{id}','SupplierController@destroy');

//Products routes
Route::get('/products', 'ProductController@getAll');
Route::get('/products/{id}', 'ProductController@get');
Route::post('/products', 'ProductController@create');
Route::put('/products/{id}', 'ProductController@update');
Route::delete('/products/{id}','ProductController@destroy');

//Stock Reception routes
Route::get('/stock_receptions', 'StockReceptionController@getAll');
Route::get('/stock_receptions/{id}', 'StockReceptionController@get');
Route::post('/stock_receptions', 'StockReceptionController@create');
Route::put('/stock_receptions/{id}', 'StockReceptionController@update');
Route::delete('/stock_receptions/{id}','StockReceptionController@destroy');



//Product Stock Reception routes
Route::get('/product_stock_receptions', 'ProductStockReceptionController@getAll');
Route::get('/product_stock_receptions/{id}', 'ProductStockReceptionController@get');
Route::post('/product_stock_receptions', 'ProductStockReceptionController@create');
Route::put('/product_stock_receptions/{id}', 'ProductStockReceptionController@update');
Route::delete('/product_stock_receptions/{id}','ProductStockReceptionController@destroy');


//Store routes
Route::get('/stores', 'StoreController@getAll');
Route::get('/stores/{id}', 'StoreController@get');
Route::post('/stores', 'StoreController@create');
Route::put('/stores/{id}', 'StoreController@update');
Route::delete('/stores/{id}','StoreController@destroy');

//Categories routes
Route::get('/categories', 'CategoryController@getAll');
Route::get('/categories/{id}', 'CategoryController@get');
Route::post('/categories', 'CategoryController@create');
Route::put('/categories/{id}', 'CategoryController@update');
Route::delete('/categories/{id}','CategoryController@destroy');

