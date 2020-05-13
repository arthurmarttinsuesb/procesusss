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

Route::get('/setor', 'SetorController@index');
Route::get('/setor/{id}', 'SetorController@show');
Route::post('/setor', 'SetorController@store');
Route::put('/setor/{id}', 'SetorController@update');
Route::delete('/setor/{id}', 'SetorController@destroy');

Route::get('/secretaria', 'SecretariaController@index');
Route::get('/secretaria/{id}', 'SecretariaController@show');
Route::post('/secretaria', 'SecretariaController@store');
Route::put('/secretaria/{id}', 'SecretariaController@update');
Route::delete('/secretaria/{id}', 'SecretariaController@destroy');

Route::get('/user-setors', 'UserSetorsController@index');
Route::get('/user-setors/{id}', 'UserSetorsController@show');
Route::post('/user-setors', 'UserSetorsController@store');
Route::put('/user-setors/{id}', 'UserSetorsController@update');
Route::delete('/user-setors/{id}', 'UserSetorsController@destroy');



