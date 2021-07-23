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

Route::get('password', function(){
    return bcrypt('webservicea');
});

//WAJIB LOGIN//
Route::get('/market', 'API\BarangController@index')->middleware('auth:api');
Route::get('/market/{id_barang}', 'API\BarangController@show')->middleware('auth:api');
Route::post('/market/', 'API\BarangController@store')->middleware('auth:api');
Route::delete('/market/{id_barang}', 'API\BarangController@destroy')->middleware('auth:api');
Route::patch('/market/{id_barang}', 'API\BarangController@update')->middleware('auth:api');

//BEBAS AKSES//
Route::get('/ayudia', 'API\BarangController@index');
Route::get('/ayudia/{id_barang}', 'API\BarangController@show');
Route::post('/ayudia/', 'API\BarangController@store');
Route::delete('/ayudia/{id_barang}', 'API\BarangController@destroy');
Route::patch('/ayudia/{id_barang}', 'API\BarangController@update');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});