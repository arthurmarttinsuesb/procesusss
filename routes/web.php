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

Route::get('/sobre', function () {
    return view('sobre.sobre');
});

Route::get('/manual/cidadao', function () {
    return view('manual.cidadao');
});

Route::get('/manual/consultar', function () {
    return view('manual.consultar_menu');
});

Route::get('/manual/processo', function () {
    return view('manual.processo');
});

Route::get('/manual/criar_processo', function () {
    return view('manual.criar_processo');
});

Route::get('/manual/add', function () {
    return view('manual.add_documentos');
});

Route::get('/manual/acoes', function () {
    return view('manual.acoes_documento');
});

Route::get('/manual/anexar', function () {
    return view('manual.anexar_documento');
});

Route::get('/manual/encaminhar', function () {
    return view('manual.encaminhar');
});

Route::get('/manual/status', function () {
    return view('manual.status');
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
            Route::post('/marcar/{id}', ['uses' => 'DocumentoController@marcar_lido']);
            Route::post('/assinar-autor/{id}', ['uses' => 'DocumentoController@assinatura_documento_autor']);
            Route::get('/{id}/arquivar', ['uses' => 'DocumentoController@arquivamentoTela']);
            Route::post('/{id}/arquivarJustificativa', ['uses' => 'DocumentoController@arquivamento']);
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
            Route::get('/{id}/encerrar', ['uses' => 'ProcessoController@encerrarTela']);
            Route::post('/{id}/encerrar', ['uses' => 'ProcessoController@encerrar']);
            Route::get('/{processo}/devolver/{tramite}', ['uses' => 'ProcessoController@devolverTela']);
            Route::post('/{processo}/devolverObservacao/{tramite}', ['uses' => 'ProcessoController@devolver']);
            Route::get('/{id}/replicar', ['uses' => 'ProcessoController@replicar']);
            Route::post('/{id}/salvarReplicar', ['uses' => 'ProcessoController@salvarReplicar']);
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
