<?php

use Illuminate\Http\Request;

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
/*
Route::apiResource('merchandise', 'MerchandiseController');
Route::apiResource('customer', 'CustomerController');
Route::apiResource('supplier', 'SupplierController');


Route::get('/{id}', function (Request $request) {
    return $request->id;
});
*/

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', 'API\PassportController@logout');
    Route::post('createsupplier', 'SupplierController@store');
    Route::post('createcustomer', 'CustomerController@store');
    Route::get('get-details', 'API\PassportController@getDetails');
    Route::group([
      'middleware'=>'CustomerMiddleware',
    ], function($router){
         Route::put('updatecustomer/{id}', 'CustomerController@update');
         Route::delete('deletecustomer/{id}', 'CustomerController@destroy');
    });
    Route::group([
      'middleware' =>'SupplierMiddleware',
    ], function($router){
         //Merchandises routes allowed for it's supplier*/
         Route::post('createmerchandise', 'MerchandiseController@store');
         Route::put('updatemerchandise', 'MerchandiseController@update');
         Route::get('showmerchandise', 'MerchandiseController@index');
         Route::delete('deletemerchandise/{id}', 'MerchandiseController@destroy');
         /*Supplier routes*/
         Route::put('updatesupplier', 'SupplierController@update');
         Route::delete('deletesupplier', 'SupplierController@destroy');
  });
});
