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

    Route::get('/load-events', 'EventsController@loadEvents')->name('routeLoadEvents');

    // Rotas que precisam do usuario ativo
    Route::group(['middleware' => 'userAtived'], function () {

        Route::group(['prefix' => 'modelo-documento', 'where' => ['prefix' => 'modelo-documento'],'middleware' => ['role:administrador|funcionario']], function () {
            Route::post('/inserir-imagem', ['uses' => 'ModeloDocumentoController@inserir_imagem']);
            Route::post('/remover-imagem', ['uses' => 'ModeloDocumentoController@remover_imagem']);
            Route::get('/list', ['uses' => 'ModeloDocumentoController@list']);
        });

        Route::group(['prefix' => 'pdf', 'where' => ['prefix' => 'pdf']], function () {
            Route::get('/modelo-documento/{id}', ['uses' => 'PDFController@modelo_documento']);
            Route::get('/documento/{id}', ['uses' => 'PDFController@documento']);
        });

        Route::group(['prefix' => 'documento', 'where' => ['prefix' => 'documento']], function () {
            Route::post('/preencher', ['uses' => 'DocumentoController@preencher']);
            Route::get('/list/{id}', ['uses' => 'DocumentoController@list']);
            Route::get('/create/{id}', ['uses' => 'DocumentoTramiteController@create']);
            Route::post('/store/{id}', ['uses' => 'DocumentoTramiteController@store']);
            Route::post('/encaminhar', ['uses' => 'DocumentoController@encaminhar']);
            Route::post('/assinar/{id}', ['uses' => 'DocumentoController@assinatura_documento']);
            Route::post('/assinar-autor/{id}', ['uses' => 'DocumentoController@assinatura_documento_autor']);
            
        });

        Route::group(['prefix' => 'documento-tramite', 'where' => ['prefix' => 'documento-tramite']], function () {
            Route::get('/list/{id}', ['uses' => 'DocumentoTramiteController@list']);
            Route::get('/create/{id}', ['uses' => 'DocumentoTramiteController@create']);
            Route::post('/store/{slug}', ['uses' => 'DocumentoTramiteController@store']);
            Route::post('/documento_devolutiva', ['uses' => 'DocumentoTramiteController@documento_devolutiva']);
        });

        Route::group(['prefix' => 'anexos', 'where' => ['prefix' => 'anexos']], function () {
            Route::post('/store/{id}', ['uses' => 'AnexoController@store']);
            Route::get('/list/{id}', ['uses' => 'AnexoController@list']);
            Route::post('/autentica/{id}', ['uses' => 'AnexoController@autentica']);
        });

        Route::group(['prefix' => 'processo-tramitacao', 'where' => ['prefix' => 'processo-tramitacao']], function () {
            Route::get('/create/{processo}/{tramitacao?}', ['uses' => 'ProcessoTramitacaoController@create']);
            Route::get('/list/{processo}', ['uses' => 'ProcessoTramitacaoController@list']);
            
        });

        Route::group(['prefix' => 'processo', 'where' => ['prefix' => 'processo']], function () {
            Route::get('/list', ['uses' => 'ProcessoController@list']);
            Route::post('/{id}/encerrar', ['uses' => 'ProcessoController@encerrar']);
            Route::post('/{id}/devolver/{tramitacao?}', ['uses' => 'ProcessoController@devolver']);
        });

        Route::group(['prefix' => 'devolutiva', 'where' => ['prefix' => 'devolutiva']], function () {
            Route::get('/devolutiva/{id}', ['uses' => 'DevolutivaDocumentoController@devolutiva']);
            Route::get('/store/{id}', ['uses' => 'DevolutivaDocumentoController@store']);
        });

        // rotas para o metodo 'list'
        Route::get('/usuario-setor/list', 'UserSetorsController@list');
        Route::get('/unidade/list', 'SecretariaController@list');
        Route::get('/processo/list', 'ProcessoController@list');
        Route::get('/setor/list', 'SetorController@list');
        Route::get('/processo/listar_processos', 'ProcessoController@listar_processos');
        Route::get('/documento/listar_documentos', 'DocumentoController@listar_documentos');
        Route::get('/ativar-usuarios/list', 'AtivarUsuariosController@list');
        Route::post('/ativar-usuarios/ativar/{id}', 'AtivarUsuariosController@ativar_usuario');
        Route::get('/consultar-processo/list/{busca}', 'ConsultarProcessoController@list');

        // lembrar de por as rotas pro metodo 'list' mais acima,
        // para que o laravel não sobrescreva(comportamento padrão do resources)
        Route::resource('modelo-documento', 'ModeloDocumentoController');
        Route::resource('usuario-setor', 'UserSetorsController');
        Route::resource('unidade', 'SecretariaController');
        Route::resource('processo', 'ProcessoController');
        Route::resource('setor', 'SetorController');
        Route::resource('fullcalendar', 'FullCalendarController');
        Route::resource('documento', 'DocumentoController');
        Route::resource('anexos', 'AnexoController');
        Route::resource('ativar-usuarios', 'AtivarUsuariosController');
        Route::resource('consultar-processo', 'ConsultarProcessoController');
        Route::resource('documento-tramite', 'DocumentoTramiteController');
        Route::resource('processo.tramite', 'ProcessoTramitacaoController')->only(['store', 'index', 'destroy']);
        Route::resource('devolutiva', 'DevolutivaDocumentoController');

        Route::get('file','FileController@create');
        Route::post('file','FileController@store');
        Route::resource('processo-tramitacao', 'ProcessoTramitacaoController');
    });
});
