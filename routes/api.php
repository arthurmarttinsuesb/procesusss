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
Route::delete('/setor/{id}', 'SetorController@delete');
