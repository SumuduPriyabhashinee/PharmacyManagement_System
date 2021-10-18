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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

Route::middleware(['auth:sanctum'])->group(function () {
Route::post('/logout', 'API\AuthController@logout');
});
Route::group(['middleware'=>['auth:sanctum','role:owner']],function (){
    
    Route::post('/customer/add','CustomerController@addCustomer');

    Route::get('/customerlist', 'CustomerController@customerList');

    Route::get('/customer/details/{id}', 'CustomerController@getCustomerbyId');

    Route::post('/item/add','ItemController@addItem');

    Route::get('/itemlist', 'ItemController@itemList');

    Route::delete('/item/delete/{id}', 'ItemController@deleteItembyId');
});

Route::group(['middleware'=>['auth:sanctum','role:manager|owner']],function (){

    Route::put('/customer/update/{id}', 'CustomerController@updateCustomerbyId');

    Route::delete('/customer/delete/{id}', 'CustomerController@deleteCustomerbyId');

});

Route::group(['middleware'=>['auth:sanctum','role:cashier|owner']],function (){

    Route::put('/item/update/{id}', 'ItemController@updateItembyId');

    Route::delete('/item/delete/{id}', 'ItemController@deleteItembyId');
});
