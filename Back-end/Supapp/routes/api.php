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
Route::apiResource('customers', 'CustomerController');
Route::apiResource('suppliers', 'SupplierController');
Route::get('downloadPhoto/{id}', 'CustomerController@downloadPhoto');

Route::get('/{id}', function (Request $request) {
    return $request->id;
});


Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', 'API\PassportController@logout');
    Route::post('createsupplier', 'SupplierController@store');
    Route::post('createcustomer', 'CustomerController@store');
    Route::get('get-details', 'API\PassportController@getDetails');
    //
    Route::post('createmerchandise', 'MerchandiseController@store');
    Route::get('showmerchandise', 'MerchandiseController@index');
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
