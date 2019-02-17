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
//Search bar
Route::get('merchandise/search', 'MerchandiseController@searchBar');

//Rotas subcategorias carnes*/
Route::get('carnes/frangos', 'MerchandiseController@listFrangos');
Route::get('carnes/bovinos', 'MerchandiseController@listBovinos');
Route::get('carnes/suinos',  'MerchandiseController@listSuinos');
Route::get('carnes/peixes',  'MerchandiseController@listPeixes');

//Rotas subcategorias  hortifruti
Route::get('hortifruti/frutas', 'MerchandiseController@listFrutas');
Route::get('hortifruti/hortalicas', 'MerchandiseController@listHortalicas');

//Rotas laticinios
Route::get('laticinios/queijos', 'MerchandiseController@listQueijo');
Route::get('laticinios/margarinas', 'MerchandiseController@listMargarina');
Route::get('laticinios/leites', 'MerchandiseController@listLeite');

//Rotas de testes
<<<<<<< HEAD
Route::apiResource('customers', 'CustomerController');
Route::apiResource('suppliers', 'SupplierController');
Route::get('downloadPhoto/{id}', 'CustomerController@downloadPhoto');

Route::get('/{id}', function (Request $request) {
    return $request->id;
});


Route::post('login', 'API\PassportController@login');
=======

/*
Route::get('/{id}', function (Request $request) {
    return $request->id;
});
*/
Route::get('rating/{id}', 'RatingController@showrating');
>>>>>>> 4f807891177a94cba0c8b23086717f8a64a407b8
Route::post('register', 'API\PassportController@register');
Route::post('logincustomer', 'CustomerController@store');
Route::post('loginsupplier', 'SupplierController@store');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('purchase','PurchaseController@index');
    Route::post('purchase/{id}','PurchaseController@store');
    Route::get('purchase/{id}','PurchaseController@show');
    Route::get('logout', 'API\PassportController@logout');
    Route::get('get-details', 'API\PassportController@getDetails');
    Route::post('rating/{id}','RatingController@rate');
    Route::post('merchandise', 'MerchandiseController@store');
    Route::get('smerchandise', 'MerchandiseController@index');
    //
    Route::group([
      'middleware'=>'CustomerMiddleware',
    ], function($router){
         Route::put('updatecustomer/{id}', 'CustomerController@update');
         Route::delete('deletecustomer/{id}', 'CustomerController@destroy');
    });
    Route::group([
      'middleware' =>'SupplierMiddleware',
    ], function($router){
         /*Supplier routes*/
         Route::put('updatesupplier/{id}', 'SupplierController@update');
         Route::delete('deletesupplier/{id}', 'SupplierController@destroy');
    });
    Route::group([
    'middleware' =>'MerchandiseMiddleware',
    ], function($router){
       //Merchandises routes allowed for it's supplier*/
        Route::put('updatemerchandise/{id}', 'MerchandiseController@update');
        Route::delete('deletemerchandise/{id}', 'MerchandiseController@destroy');
    });
});
