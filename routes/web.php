<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/selecionar-cidade/{id}', 'EstadoCidadeController@select_cidade')->name('selecionar-cidade');


Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'modelo-documento', 'where' => ['prefix' => 'modelo-documento']], function () {
        Route::get('/', ['uses' => 'ModeloDocumentoController@index'])->name('modelo_documento');
        Route::get('/novo', ['uses' => 'ModeloDocumentoController@novo'])->name('adicionar_modelo');
        Route::get('/editar/{id}', ['uses' => 'ModeloDocumentoController@editar'])->name('editar_modelo');
        Route::post('/inserir-imagem', ['uses' => 'ModeloDocumentoController@inserir_imagem'])->name('inserir_imagem');
        Route::get('/list', ['uses' => 'ModeloDocumentoController@list'])->name('listar_modelo');
        Route::post('/delete', ['uses' => 'ModeloDocumentoController@delete']);
        Route::post('/store', ['uses' => 'ModeloDocumentoController@store']);
        Route::post('/update', ['uses' => 'ModeloDocumentoController@update']);
    });

    Route::get('/secretaria/list', 'SecretariaController@list');
    Route::resource('secretaria', 'SecretariaController');
});
