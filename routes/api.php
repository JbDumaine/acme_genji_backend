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

Route::get('/suppliers', 'SupplierController@getAll');
Route::get('/suppliers/{id}', 'SupplierController@get');
Route::post('/suppliers', 'SupplierController@create');
Route::put('/suppliers/{id}', 'SupplierController@update');
Route::delete('/suppliers/{id}','SupplierController@destroy');

Route::get('/products', 'ProductController@getAll');
Route::get('/products/{id}', 'ProductController@get');
Route::post('/products', 'ProductController@create');
Route::put('/products/{id}', 'ProductController@update');
Route::delete('/products/{id}','ProductController@destroy');
