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

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', 'API\PassportController@logout');
    Route::get('get-details', 'API\PassportController@getDetails');
    Route::group([
      'middleware'=>'CustomerMiddleware',
    ], function($router){
         Route::put('updateYourself', 'CustomerController@update');
         Route::delete('deleteYourself', 'CustomerConhtroller@destroy');
    });

});



Route::apiResource('customers', 'CustomerController');
Route::apiResource('suppliers', 'SupplierController');
Route::apiResource('merchandises', 'MerchandiseController');
