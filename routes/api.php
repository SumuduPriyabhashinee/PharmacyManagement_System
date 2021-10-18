<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', 'API\AuthController@login');

Route::middleware(['auth:sanctum'])->group(function () {
Route::post('/logout', 'API\AuthController@logout');
});
Route::group(['middleware'=>['auth:sanctum','role:owner']],function (){

    Route::post('/register', 'API\AuthController@register');
    
    Route::post('/customer/add','CustomerController@addCustomer');

    Route::get('/customerlist', 'CustomerController@customerList');

    Route::get('/customer/details/{id}', 'CustomerController@getCustomerbyId');

    Route::post('/item/add','ItemController@addItem');

    Route::get('/itemlist', 'ItemController@itemList');

    Route::get('/item/details/{id}', 'ItemController@getItembyId');

    Route::delete('/item/delete/{id}', 'ItemController@deleteItembyId');

    Route::post('/order/add','OrderController@addOrder');

    Route::get('/orderlist', 'OrderController@OrderList');
    
    Route::get('/order/details/{id}', 'OrderController@getOrderbyId');

    Route::delete('/order/delete/{id}', 'OrderController@deleteOrderbyId');

});

Route::group(['middleware'=>['auth:sanctum','role:manager|owner']],function (){

    Route::put('/customer/update/{id}', 'CustomerController@updateCustomerbyId');

    Route::delete('/customer/delete/{id}', 'CustomerController@deleteCustomerbyId');

});

Route::group(['middleware'=>['auth:sanctum','role:cashier|owner']],function (){

    Route::put('/item/update/{id}', 'ItemController@updateItembyId');

    Route::delete('/item/delete/{id}', 'ItemController@deleteItembyId');
});
