<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestProcessus;
use App\Http\Requests;


use Auth;
use DataTables;
use DB;
use Session;
use Redirect;
#class
use Str;
use App\UserSetor;
use App\Processo;
use App\ProcessoAnexo;
use App\ProcessoDocumento;
use App\ProcessoTramitacao;

use App\DocumentoTramite;
use App\ProcessoLog;
use App\Http\Utility\BotoesDatatable;
use App\Http\Utility\ParticipacaoProcesso;


class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelo = Processo::where('status', "Ativo")->get();
        return view('processo.index');
    }

    
    public function list(Request $request)
    {
        $user = Auth::user(); //
        if ($user->hasRole('administrador')) {
            $processos = Processo::with('documentos')->with('documentos.tramite')->get();
        } else {
            $processos = Processo::where('fk_user', $user->id)->with('documentos')->with('documentos.tramite')->get();
        }
        // $aux = 
        return Datatables::of($processos)
            ->editColumn('status', function ($processos) {
                if ($processos->status == 'Ativo') {
                    return  '<span class="right badge badge-success">em andamento</span>';
                } else if ($processos->status == 'Encaminhado') {
                    return  '<span class="right badge badge-info">em andamento</span>';
                } else  if ($processos->status == 'Finalizado' || $processos->status == 'Encerrado') {
                    return  '<span class="right badge badge-danger">encerrado</span>';
                }
            })
            ->editColumn('usuario', function ($processo) {
                return  $processo->user->nome;
            })
            ->editColumn('data', function ($processo) {
                return  date('d/m/Y', strtotime($processo->created_at));
            })
            ->editColumn('acao', function ($processo) {
                $btnVisualizar = '';
                $btnAlterar = '';
                $btnReplicar = '';

                if ($processo->status == 'Finalizado' || $processo->status == 'Encerrado') {
                    $btnVisualizar = '<div class="btn-group btn-group-sm">
                                        <a href="/processo/' . $processo->numero . '"
                                            class="btn bg-teal color-palette"
                                            title="Visualizar" data-toggle="tooltip">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>';
                } else {
                    $btnVisualizar = '<div class="btn-group btn-group-sm">
                                        <a href="/processo/' . $processo->numero . '"
                                            class="btn bg-teal color-palette"
                                            title="Visualizar" data-toggle="tooltip">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>';
                }
                if ($processo->tramite == "Liberado") {
                    $btnAlterar = '<div class="btn-group btn-group-sm">
                                        <a href="/processo/' . $processo->numero . '/edit"
                                            class="btn btn-info"
                                            title="Alterar" data-toggle="tooltip">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </div>';
                }
                if (Auth::user()->id == $processo->fk_user) {
                    // $btnReplicar = '<div class="btn-group btn-group-sm">
                    //                     <a href="/processo/' . $processo->id . '/replicar"
                    //                         class="btn btn-primary"
                    //                         title="Replicar" data-toggle="tooltip">
                    //                         <i class="fas fa-copy"></i>
                    //                     </a>
                    //                 </div>';
                }
                return $btnVisualizar . " " . $btnAlterar . " " . $btnReplicar;
            })
            ->editColumn('criado', function ($processo) {
                return  $processo->created_at;
            })->escapeColumns([0])
            ->make(true);
    }
    public function listar_processos()
    {
        $user = Auth::user();
        if ($user->hasRole('administrador') || $user->hasRole('colaborador-nivel-2')) {

            $setor  = UserSetor::where('fk_user', Auth::user()->id)->where('status', 'Ativo')->first();
            $processo  = ProcessoTramitacao::where('status', 'Criado')->where('fk_user', Auth::user()->id)->orWhere('fk_setor', $setor->fk_setor)->get();
            return view('processo.processo_lista', compact('processo'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $id = Auth::id();
            $numero_processo = 'pmj.' . time() . '.' . date('Y');
            $processo = new Processo();
            $processo->titulo = $request->titulo;
            $processo->descricao = $request->descricao;
            $processo->numero = $numero_processo;
            $processo->tipo = $request->tipo;
            $processo->fk_user = $id;
            $processo->status = 'Ativo';
            $processo->save();

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $processo->id;
            $log->status = 'Processo nº "' . $numero_processo . '" criado por: <b>' . Auth::user()->nome . '</b>';
            $log->save();

            return Redirect::to('processo/' . $processo->numero . '/edit');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível cadastrar, tente novamente mais tarde.!' . $erro);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $processo = Processo::firstWhere('numero', $id);

        //se o número do processo não for encontrado o usuário é direcionado para uma página de erro 404
        if (!isset($processo)) {
            abort(404);
        } else {
            $processo_anexo = ProcessoAnexo::where('fk_processo', $processo->id)->where('status', 'Ativo')->get();
            $processo_documento = ProcessoDocumento::where('fk_processo', $processo->id)->where('status', 'Ativo')->get();
            $processo_tramitacao = ProcessoTramitacao::where('fk_processo', $processo->id)->where('status', 'Criado')->with('user')->with('setor')->with('processo')->get();
            $log = ProcessoLog::where('fk_processo', $processo->id)->paginate(10);

            /*criei uma função para verificar se o usuário logado está participando do processo,
                seja como autor ou na tramitação*/
            $verifica_usuario = ParticipacaoProcesso::participacao_processo_user(Auth::user()->id, $processo->id);

            /*Caso o processo seja público não temos nenhum tipo de bloqueio*/
            if ($processo->tipo == "Público") {
                return view('processo.show', compact('processo', 'log', 'processo_documento', 'processo_anexo', 'processo_tramitacao'));

                /*O Processo sendo privado é realizada algumas verificações
                1º se o usuário for do tipo cidadão + faz parte do processo (autor ou na tramitação), então é liberado o seu acesso caso
                não seja o usuário é redirecionado para uma página com o erro 401 de acesso negado;
                2º caso o usuário seja colaborador, então é feita a verificação se ele faz parte do processo via seu ID ou por está
                vinculado a um setor que tenha participação no processo, caso o retorno seja true é liberado o seu acesso, se for false
                então ele é redirecionado para a página do erro 401*/
            } else if ($processo->tipo == "Privado") {
                if (Auth::user()->hasRole('cidadao')) {
                    if ($verifica_usuario == true) {
                        return view('processo.show', compact('processo', 'log', 'processo_documento', 'processo_anexo', 'processo_tramitacao'));
                    } else {
                        abort(401);
                    }
                } else {
                    //verifico se o usuário logado está inserido em algum setor
                    $usuario_setor = UserSetor::where('fk_user', Auth::user()->id)->where('status', 'Ativo')->first();
                    $verifica_setor = ParticipacaoProcesso::participacao_processo_setor($usuario_setor->fk_setor, $processo->id);

                    if ($verifica_usuario == true || $verifica_setor == true) {
                        return view('processo.show', compact('processo', 'log', 'processo_documento', 'processo_anexo', 'processo_tramitacao'));
                    } else {
                        abort(401);
                    }
                }
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $processo = Processo::firstWhere('numero', $id);

        if (!isset($processo)) {
            abort(404);
        } else {
            $log = ProcessoLog::where('fk_processo', $processo->id)->get();

            /* Independente do tipo de usuário, se sou autor do processo e tenho o tramite = Liberado (Tenho acesso a editar o processo), caso o tramite = Bloqueado (Mesmo sendo autor, só tenho acesso a visualizar o processo)*/
            if ($processo->fk_user == Auth::user()->id && $processo->tramite == "Liberado") {
                return view('processo.edit', ['processo' => $processo, 'log' => $log, 'tramite' => "", 'tipo' => ""]);
            } else if ($processo->fk_user == Auth::user()->id && $processo->tramite == "Bloqueado") {
                return Redirect::to('processo/' . $processo->numero);
            } else {

                /*Confiro qual o tipo de usuário logado, se for do tipo cidadão faço as seguintes
                verificações para determinar o tipo de acesso:
                    1º - não é autor do processo+teor= Público (Pode acessar a tela de consulta)
                    2º - não é autor do processo+teor= Privado (Redirecionado para a página de erro 401 que é de permissão negada) */

                if (Auth::user()->hasRole('cidadao')) {
                    if ($processo->fk_user !== Auth::user()->id && $processo->tipo == "Público") {
                        return Redirect::to('processo/' . $processo->numero);
                    } else if ($processo->fk_user !== Auth::user()->id && $processo->tipo == "Privado") {
                        abort(401);
                    }
                } else {
                    //verifico o setor no qual o colaborador está lotado.
                    $usuario_setor = UserSetor::where('fk_user', Auth::user()->id)->where('status', 'Ativo')->first();

                    /* para liberar o acesso ao usuário do tipo colaborador preciso realizar as devidas verificações na tabela de tramitação
                    - Preciso saber se o usuário faz parte do processo, seja como usuário direto ou como parte do setor com o status dessa tramitação bloqueada ou não*/
                    $processo_tramitacao_user_livre = ProcessoTramitacao::where('fk_processo', $processo->id)->where('fk_user', Auth::user()->id)->where('status', 'Criado')->first();

                    $processo_tramitacao_user_bloqueado = ProcessoTramitacao::where('fk_processo', $processo->id)->where('fk_user', Auth::user()->id)->where('status', 'Bloqueado')->first();

                    $processo_tramitacao_setor_livre = ProcessoTramitacao::where('fk_setor', $usuario_setor->fk_setor)->where('fk_processo', $processo->id)->where('status', 'Criado')->first();

                    $processo_tramitacao_setor_bloqueado = ProcessoTramitacao::where('fk_setor', $usuario_setor->fk_setor)->where('fk_processo', $processo->id)->where('status', 'Bloqueado')->first();

                    /*Apesar das repetições quanto ao acesso ao banco nessa etapa eu confirmo se:
                    1º Se o usuário com o seu ID faz parte da tramitação e seu status = Criado (Libero o acesso para editar o processo);
                    2º Se o usuário com o seu ID faz parte da tramiatação mais o seu status = Bloqueado (Libero acesso somente para visualizar o processo);
                    3º Caso o processo foi enviado para o setor do usuário e o status da tramitação = Criado (É liberada o acesso a qualquer usuário que faça parte do setor e qualquer um pode fazer as devidas observações e alterações)
                    4º O processo passou pelo setor mais o status da tramitação = Bloqueado (Liberado somente a visualização)
                    5º Caso nenhuma dessas vericações sejam true, então partimos para o ultimo else que nesse caso o usuário não se faz participante de nenhuma forma do processo mais quer te acesso, diante disso observamos se o processo tem o teor público ou privado, se for público pode visualizar se for privado é enviado para a página de erro 401 que apresenta a mensagem de acesso não autorizado. */
                    if (isset($processo_tramitacao_user_livre)) {
                        return view('processo.edit', ['processo' => $processo, 'log' => $log, 'tramite' => $processo_tramitacao_user_livre->id, 'tipo' => 'usuario']);
                    } else if (isset($processo_tramitacao_user_bloqueado)) {
                        return Redirect::to('processo/' . $processo->numero);
                    } else if (isset($processo_tramitacao_setor_livre)) {
                        return view('processo.edit', ['processo' => $processo, 'log' => $log, 'tramite' => $processo_tramitacao_setor_livre->id, 'tipo' => 'setor']);
                    } else if (isset($processo_tramitacao_setor_bloqueado)) {
                        return Redirect::to('processo/' . $processo->numero);
                    } else {
                        if ($processo->tipo == "Público") {
                            return Redirect::to('processo/' . $processo->numero);
                        } else if ($processo->tipo == "Privado") {
                            abort(401);
                        }
                    }
                }
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $processo = Processo::find($id);
            $processo->titulo = $request->titulo;
            $processo->descricao = $request->descricao;
            $processo->tipo = $request->tipo;

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $id;
            $log->status = "Dados do processo foram alteradas por: <b>" . Auth::user()->nome . "</b>";


            DB::transaction(function () use ($processo, $log) {
                $processo->save();
                $log->save();
            });

            Session::flash('message_sucesso', 'Dados alterados.');
            return Redirect::to('processo/' . $processo->numero . '/edit');
        } catch (\Exception  $erro) {
            Session::flash('message_erro', 'Não foi possível alterar os dados do processo, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }

    public function encerrarTela($id)
    {
        try {
            $processo_busca = Processo::find($id);

            return view('justificativa.encerrar', compact('processo_busca'));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => 'ERRO'));
        }
    }

    public function encerrar($id, Request $request)
    {
        try {
            $processo = Processo::find($id);
            $processo->status = "Encerrado";
            $processo->tramite = "Encerrado";

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $id;
            $log->status = "Processo encerrado por: <b>" . Auth::user()->nome . "</b>, por causa de " . $request->justificativa;



            DB::transaction(function () use ($processo, $log, $id) {
                $processo->save();
                $log->save();

                ProcessoTramitacao::where('fk_processo', $id)->where('status', 'Criado')->orWhere('status', 'Liberado')->update(['status' => 'Bloqueado']);
            });

            return Redirect::to('processo/');
        } catch (\Exception  $erro) {
            return response()->json(array('errors' => $erro));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function replicar($numero)
    {
        $processo = Processo::firstWhere('numero', $numero);
        $processo_documento = ProcessoDocumento::where('fk_processo', $processo->id)->where('status', 'Ativo')->get();
        return view('processo.replicar', compact('processo', 'processo_documento'));
    }

    public function replicarModal(Request $request){
        return Redirect::to('processo/' . $request->processo . '/replicar');
    }

    public function salvarReplicar(RequestProcessus $request)
    {
        try {
            $numero_processo = 'pmj.' . time() . '.' . date('Y');
            $processo = new Processo();
            $processo->titulo = $request->titulo;
            $processo->descricao = $request->descricao;
            $processo->numero = $numero_processo;
            $processo->tipo = $request->tipo;
            $processo->fk_user = Auth::user()->id;
            $processo->status = 'Ativo';

            $log =  new ProcessoLog();

            DB::transaction(function () use ($request, $processo, $log) {
                $processo->save();

                $log->fk_user = Auth::user()->id;
                $log->fk_processo = $processo->id;
                $log->status = 'Processo nº "' . $processo->numero . '" criado por: <b>' . Auth::user()->nome . '</b>';
                $log->save();
                if($request->doc!=""){
                    foreach ($request->doc as $sele => $value) {
                        // Busca o documento selecionado
                        $selecionado = ProcessoDocumento::firstWhere('id', $value);
    
                        //Salvar documento selecionado
                        $modelo =  new ProcessoDocumento();
                        $modelo->fk_processo = $processo->id;
                        $modelo->fk_user = Auth::user()->id;
                        $modelo->fk_modelo_documento = $selecionado->fk_modelo_documento;
                        $modelo->titulo = $selecionado->titulo;
                        $modelo->descricao = $selecionado->descricao;
                        $modelo->conteudo = $selecionado->conteudo;
                        $modelo->tipo =  $selecionado->tipo;
    
                        //Add Log do documento selecionado
                        $log1 =  new ProcessoLog();
    
                        $log1->fk_user = Auth::user()->id;
                        $log1->fk_processo = $processo->id;
                        $log1->status = 'Documento "' . $selecionado->titulo . '" replicado por: <b>' . Auth::user()->nome . '</b> do processo nº ' . $request->n_processo_antigo;
    
                        $modelo->save();
                        $log1->save();
                    }
                }
            });
           
            return Redirect::to('processo/' . $processo->numero . '/edit');

        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível cadastrar, tente novamente mais tarde.!' . $erro);
            return back()->withInput();
        }
    }

    public function devolverTela($processo, $tramite)
    {
        try {
            $processo_busca = Processo::find($processo);
            $tramite_busca = ProcessoTramitacao::find($tramite);

            return view('justificativa.observacao', compact('processo_busca', 'tramite_busca'));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => 'ERRO'));
        }
    }

    public function devolver($processo, $tramite, Request $request)
    {
        try {
            $processo_busca = Processo::find($processo);
            $tramite_busca = ProcessoTramitacao::find($tramite);

            $processo_busca->tramite = "Liberado";
            $processo_busca->status = "Ativo";

            $tramite_busca->status = "Bloqueado";

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $processo_busca->id;
            $log->status = "Processo devolvido por: <b>" . Auth::user()->nome . "</b> para o autor(a) : <b>" . $processo_busca->user->nome . "</b>, por causa de " . $request->justificativa;


            DB::transaction(function () use ($processo_busca, $tramite_busca, $log) {
                $processo_busca->save();
                $tramite_busca->save();
                $log->save();
            });

            return Redirect::to('processo/');
        } catch (\Exception  $erro) {
            return response()->json(array('errors' => 'ERRO'));
        }
    }

    // public function devolver($id, ProcessoTramitacao $tramitacao)
    // {
    //     try {
    //         $processo = Processo::find($id);
    //         $processo->tramite = "Liberado";
    //         $processo->status = "Ativo";

    //         $log =  new ProcessoLog();
    //         $log->fk_user = Auth::user()->id;
    //         $log->fk_processo = $id;
    //         $log->status = "Processo devolvido por: <b>".Auth::user()->nome."</b> para o autor(a) : <b>".$processo->user->nome."</b>";

    //         $tramitacao->status = "Bloqueado";

    //         DB::transaction(function () use ($processo,$tramitacao,$log) {
    //             $processo->save();
    //             $tramitacao->save();
    //             $log->save();
    //         });

    //         return response()->json(array('status' => "Ok"));
    //     } catch (\Exception  $erro) {
    //         return response()->json(array('errors' => $erro));
    //     }
    // }
}
