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
        Route::post('/inserir-imagem', ['uses' => 'ModeloDocumentoController@inserir_imagem'])->name('inserir_imagem');
        Route::get('/list', ['uses' => 'ModeloDocumentoController@list'])->name('listar_modelo');
    });

    // rotas para o metodo 'list'
    Route::get('/secretaria/list', 'SecretariaController@list');
    Route::get('/setor/list', 'SetorController@list');
    Route::get('/processo/list', 'ProcessoController@list');

    // lembrar de por as rotas pro metodo 'list' mais acima,
    // para que o laravel não sobrescreva(comportamento padrão do resources)
    Route::resource('modelo-documento', 'ModeloDocumentoController');
    Route::resource('usuario-setor', 'UserSetorsController');
    Route::resource('secretaria', 'SecretariaController');
    Route::resource('processo', 'ProcessoController');
    Route::resource('setor', 'SetorController');
});
