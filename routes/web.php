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


Route::get('/sobre/geral' , function () {
    return view('sobre.sobre');
});

Route::get('/sobre/usuario', function () {
    return view('sobre.sobre_logado');
});

// MANUAL CIDADÃO
Route::get('/manual/cidadao', function () {
    return view('manual.cidadao.cidadao');
});

Route::get('/manual/consultar', function () {
    return view('manual.cidadao.consultar_menu');
});

Route::get('/manual/processo', function () {
    return view('manual.cidadao.processo');
});

Route::get('/manual/criar_processo', function () {
    return view('manual.cidadao.criar_processo');
});

Route::get('/manual/add', function () {
    return view('manual.cidadao.add_documentos');
});

Route::get('/manual/acoes', function () {
    return view('manual.cidadao.acoes_documento');
});

Route::get('/manual/anexar', function () {
    return view('manual.cidadao.anexar_documento');
});

Route::get('/manual/encaminhar', function () {
    return view('manual.cidadao.encaminhar');
});

Route::get('/manual/status', function () {
    return view('manual.cidadao.status');
});
// FIM MANUAL CIDADÃO

// MANUAL COLABORADOR
Route::get('/manual/colaborador', function () {
    return view('manual.colaborador.colaborador');
});

Route::get('/manual/colaborador/processo', function () {
    return view('manual.colaborador.processo');
});

Route::get('/manual/colaborador/consultar', function () {
    return view('manual.colaborador.consultar_colaborador');
});

Route::get('/manual/colaborador/add-doc', function () {
    return view('manual.colaborador.add_doc_colaborador');
});

Route::get('/manual/colaborador/modelo', function () {
    return view('manual.colaborador.modelo_doc');
});

Route::get('/manual/colaborador/acoes', function () {
    return view('manual.colaborador.acoes_doc_colaborador');
});

Route::get('/manual/colaborador/criar_processo', function () {
    return view('manual.colaborador.criar_processo_colaborador');
});

Route::get('/manual/colaborador/anexar', function () {
    return view('manual.colaborador.anexar_doc_colaborador');
});

Route::get('/manual/colaborador/encaminhar', function () {
    return view('manual.colaborador.encaminhar_colaborador');
});

Route::get('/manual/colaborador/status', function () {
    return view('manual.colaborador.status_colaborador');
});
// FIM MANUAL COLABORADOR

// MANUAL ADMINISTRADOR
Route::get('/manual/administrador', function () {
    return view('manual.administrador.administrador');
});

Route::get('/manual/administrador/consultar', function () {
    return view('manual.administrador.consultar_adm');
});

Route::get('/manual/administrador/processo', function () {
    return view('manual.administrador.processo');
});

Route::get('/manual/administrador/add-doc', function () {
    return view('manual.administrador.add_doc_adm');
});

Route::get('/manual/administrador/acoes', function () {
    return view('manual.administrador.acoes_doc_adm');
});

Route::get('/manual/administrador/criar_processo', function () {
    return view('manual.administrador.criar_processo_adm');
});

Route::get('/manual/administrador/anexar', function () {
    return view('manual.administrador.anexar_doc_adm');
});

Route::get('/manual/administrador/encaminhar', function () {
    return view('manual.administrador.encaminhar_adm');
});

Route::get('/manual/administrador/status', function () {
    return view('manual.administrador.status_adm');
});

Route::get('/manual/administrador/modelo', function () {
    return view('manual.administrador.modelo_adm');
});

Route::get('/manual/administrador/unidade', function () {
    return view('manual.administrador.unidade');
});

Route::get('/manual/administrador/setor', function () {
    return view('manual.administrador.setor');
});

Route::get('/manual/administrador/usuarios', function () {
    return view('manual.administrador.usuarios');
});

Route::get('/manual/administrador/colaboradores', function () {
    return view('manual.administrador.colaboradores');
});
// FIM MANUAL ADMINISTRADOR

Route::get('/selecionar-cidade/{id}', 'EstadoCidadeController@select_cidade')->name('selecionar-cidade');
Route::get('/selecionar-setor/{id}', 'SecretariaSetorController@select_setores')->name('selecionar-setor');
// Route::post('/selecionar-setor/{id}', 'SecretariaSetorController@select_setores')->name('selecionar-setor');
Route::post('/replicarModal', 'ProcessoController@replicarModal');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/load-events', 'EventsController@loadEvents')->name('routeLoadEvents');

    // Rotas que precisam do usuario ativo
    Route::group(['middleware' => 'userAtived'], function () {

        Route::group(['prefix' => 'modelo-documento', 'where' => ['prefix' => 'modelo-documento'],'middleware' => ['role:administrador|colaborador-nivel-1|colaborador-nivel-2']], function () {
            Route::post('/inserir-imagem', ['uses' => 'ModeloDocumentoController@inserir_imagem']);
            Route::post('/remover-imagem', ['uses' => 'ModeloDocumentoController@remover_imagem']);
            Route::get('/list', ['uses' => 'ModeloDocumentoController@list']);
        });


        Route::group(['prefix' => 'meu-modelo', 'where' => ['prefix' => 'meu-modelo']], function () {
            Route::get('/list', ['uses' => 'MeuModeloController@list']);
            Route::get('/{slug}/edit', ['uses' => 'MeuModeloController@edit']);
        });

        Route::group(['prefix' => 'pdf', 'where' => ['prefix' => 'pdf']], function () {
            Route::get('/modelo-documento/{slug}', ['uses' => 'PDFController@modelo_documento']);
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
            Route::get('/{numero}/replicar', ['uses' => 'ProcessoController@replicar']);
            Route::post('/salvarReplicar', ['uses' => 'ProcessoController@salvarReplicar']);
            
        });

        Route::group(['prefix' => 'devolutiva', 'where' => ['prefix' => 'devolutiva']], function () {
            Route::get('/devolutiva/{id}', ['uses' => 'DevolutivaDocumentoController@devolutiva']);
            Route::get('/store/{id}', ['uses' => 'DevolutivaDocumentoController@store']);
        });
        //rota para usuario mudar o email
        Route::get('/conta/editEmail', 'accountController@editEmail');
        Route::get('/conta/editSenha', 'accountController@editSenha');
        // rotas para o metodo 'list'
        Route::get('/usuario-setor/list', 'UserSetorsController@list');
        Route::get('/unidade/list', 'SecretariaController@list');
        Route::get('/processo/list', 'ProcessoController@list');
        Route::get('/setor/list', 'SetorController@list');
        Route::get('/usuarios/list', 'userController@listUser'); // controller para lista usuarios no datatables
        Route::get('/processo/listar_processos', 'ProcessoController@listar_processos');
        Route::get('/documento/listar_documentos', 'DocumentoController@listar_documentos');
        Route::get('/ativar-usuarios/list', 'AtivarUsuariosController@list');
        Route::get('/ativar-usuarios/visualizar-dados/{slug}', 'AtivarUsuariosController@visualizar_dados');
        Route::post('/ativar-usuarios/ativar/{slug}', 'AtivarUsuariosController@ativar_usuario');
        Route::get('/consultar-processo/list/{busca}', 'ConsultarProcessoController@list');
        Route::get('/modelo-documento/list', 'ModeloDocumentoController@list');
        Route::get('/meu-modelo/list', 'MeuModeloController@list');
       
        //rota usuario setor
        Route::post('/usuario-setor/busca', 'UserSetorsController@busca');
        //rota edit com slug
        Route::post('/usuario-setor/{slug}/edit', 'UserSetorsController@edit');

        // lembrar de por as rotas pro metodo 'list' mais acima,
        // para que o laravel não sobrescreva(comportamento padrão do resources)
        Route::resource('modelo-documento', 'ModeloDocumentoController');
        Route::resource('meu-modelo', 'MeuModeloController');
        Route::resource('usuario-setor', 'UserSetorsController');
        Route::resource('unidade', 'SecretariaController');
        Route::resource('usuarios', 'userController'); //rota de usuarios
        Route::resource('processo', 'ProcessoController');
        Route::resource('setor', 'SetorController');
        Route::resource('conta', 'accountController');
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
