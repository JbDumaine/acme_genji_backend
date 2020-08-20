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

Route::group([
    'name' => 'secured.',
    'middleware' => 'auth:api'

], function () {
    //Suppliers routes
    Route::get('/suppliers', 'SupplierController@getAll');
    Route::get('/suppliers/{id}', 'SupplierController@get');
    Route::post('/suppliers', 'SupplierController@create');
    Route::put('/suppliers/{id}', 'SupplierController@update');
    Route::delete('/suppliers/{id}', 'SupplierController@destroy');
    Route::get('/supplierscount', 'SupplierController@count');

    //Products routes
    Route::get('/products', 'ProductController@getAll');
    Route::get('/products/{id}', 'ProductController@get');
    Route::post('/products', 'ProductController@create');
    Route::put('/products/{id}', 'ProductController@update');
    Route::delete('/products/{id}', 'ProductController@destroy');
    Route::get('/productscount', 'ProductController@count');

    //Categories routes
    Route::get('/categories', 'CategoryController@getAll');
    Route::get('/categories/{id}', 'CategoryController@get');
    Route::post('/categories', 'CategoryController@create');
    Route::put('/categories/{id}', 'CategoryController@update');
    Route::delete('/categories/{id}', 'CategoryController@destroy');
    Route::get('/categoriescount', 'CategoryController@count');

    //Stock Reception routes
    Route::get('/stock_receptions', 'StockReceptionController@getAll');
    Route::get('/stock_receptions/{id}', 'StockReceptionController@get');
    Route::post('/stock_receptions', 'StockReceptionController@create');
    Route::put('/stock_receptions/{id}', 'StockReceptionController@update');
    Route::delete('/stock_receptions/{id}', 'StockReceptionController@destroy');

    //Store routes
    Route::get('/stores', 'StoreController@getAll');
    Route::get('/stores/{id}', 'StoreController@get');
    Route::post('/stores', 'StoreController@create');
    Route::put('/stores/{id}', 'StoreController@update');
    Route::delete('/stores/{id}', 'StoreController@destroy');

    //Command routes
    Route::get('/commands', 'CommandController@getAll');
    Route::get('/commands/{id}', 'CommandController@get');
    Route::post('/commands', 'CommandController@create');
    Route::put('/commands/{id}', 'CommandController@update');
    Route::delete('/commands/{id}', 'CommandController@destroy');
    Route::get('/commandscount', 'CommandController@count');

    //City routes
    Route::get('/cities', 'CityController@getAll');
    Route::get('/cities/{id}', 'CityController@get');
    Route::get('/cities/search/{term}', 'CityController@getByTerms');

    //Product Stock Reception routes
    Route::get('/product_stock_receptions', 'ProductStockReceptionController@getAll');
    Route::get('/product_stock_receptions/{id}', 'ProductStockReceptionController@get');
    Route::post('/product_stock_receptions', 'ProductStockReceptionController@create');
    Route::put('/product_stock_receptions/{id}', 'ProductStockReceptionController@update');
    Route::delete('/product_stock_receptions/{id}', 'ProductStockReceptionController@destroy');

    //Product Command routes
    Route::get('/product_commands', 'ProductCommandController@getAll');
    Route::get('/product_commands/{id}', 'ProductCommandController@get');
    Route::post('/product_commands', 'ProductCommandController@create');
    Route::put('/product_commands/{id}', 'ProductCommandController@update');
    Route::delete('/product_commands/{id}','ProductCommandController@destroy');
});

//Auth routes
Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
