<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/customer/add','CustomerController@addCustomer');

Route::get('/customerlist', 'CustomerController@customerList');

Route::get('/customer/details/{id}', 'CustomerController@getCustomerbyId');

Route::put('/customer/update/{id}', 'CustomerController@updateCustomerbyId');

Route::delete('/customer/delete/{id}', 'CustomerController@deleteCustomerbyId');


Route::post('/item/add','ItemController@addItem');

Route::get('/itemlist', 'ItemController@itemList');

Route::get('/item/details/{id}', 'ItemController@getItembyId');

Route::put('/item/update/{id}', 'ItemController@updateItembyId');

Route::delete('/item/delete/{id}', 'ItemController@deleteItembyId');