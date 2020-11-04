<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $processos = Processo::where('status',"!=", "Finalizado")->with('documentos')->with('documentos.tramite')->get();
        } else {
            $processos = Processo::where('fk_user', $user->id)->where('status', "Ativo")->with('documentos')->with('documentos.tramite')->get();
        }

        return Datatables::of($processos)
            ->editColumn('status', function ($processos) {
                if($processos->status=='Ativo'){
                    return  '<span class="right badge badge-success">em andamento</span>';
                } else if($processos->status=='Encaminhado'){
                    return  '<span class="right badge badge-info">em andamento</span>';
                }else  if($processos->status=='Finalizado'){
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
                return '<div class="btn-group btn-group-sm">
                                <a href="/processo/' . $processo->id . '/edit"
                                    class="btn btn-info"
                                    title="Alterar" data-toggle="tooltip">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="/processo/' . $processo->id . '"
                                class="btn bg-teal color-palette"
                                title="Visualizar" data-toggle="tooltip">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>';
            })
            ->editColumn('criado', function ($processo) {
                return  $processo->created_at;

            })->escapeColumns([0])
            ->make(true);
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
            $log->status = 'Processo nº "'.$numero_processo.'" criado por: <b>'.Auth::user()->nome.'</b>';
            $log->save();

            return Redirect::to('processo/' . $processo->id . '/edit');
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
        $processo = Processo::find($id);
        foreach(Auth::user()->getRoleNames() as $nome){
            //verifico se o usuário logado é cidadão
            if($nome!=="cidadao" || $processo->fk_user == Auth::user()->id){

                $processo_anexo = ProcessoAnexo::where('fk_processo', $id)->where('status', 'Ativo')->get();
                $processo_documento = ProcessoDocumento::where('fk_processo', $id)->where('status','Ativo')->get();
                $processo_tramitacao = ProcessoTramitacao::where('fk_processo', $id)->where('status','Criado')->with('user')->with('setor')->with('processo')->get();
                $log = ProcessoLog::where('fk_processo', $id)->paginate(10);

                return view('processo.show',compact('processo','log','processo_documento','processo_anexo','processo_tramitacao'));
            }else{
                abort(401);
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


        $processo = Processo::find($id);
        $log = ProcessoLog::where('fk_processo', $id)->get();
        //verifico qual o tipo de usuário logado
        $tipo_usuario = Str::of(Auth::user()->getRoleNames())->replaceMatches('/[^A-Za-z0-9]++/', '');
         /*criei uma função para verificar se o usuário logado está participando do processo, 
         seja como autor ou na tramitação*/
        $verifica_usuario = ParticipacaoProcesso::participacao_processo_user(Auth::user()->id,$id);
        //verifico se o usuário logado está inserido em algum setor
        $usuario_setor = UserSetor::where('fk_user',Auth::user()->id)->where('status','Ativo')->first();
       
        /*Verifico se o processo é privado, se for e o usuário for do tipo cidadão utilizo a função que consulta 
         as tabelas necessárias para saber se o usuário faz parte do processo, se ele fizer pode acessar
         o caminho determinado, se não ele é redirecionado para uma página que informa que ele 
         não possui autorização de acesso a essa página, a mesma verificação é feita para o usuário 
         que é colaborador/funcionário */

        if($processo->tipo=="Privado"){

            if($tipo_usuario=="cidadao"){
                if($verifica_usuario==true){
                    return view('processo.edit', ['processo' => $processo,'log' => $log]);
                }else{
                    abort(401);
                }
            }else{
                $verifica_setor = ParticipacaoProcesso::participacao_processo_setor($usuario_setor->fk_setor,$id);

                if($verifica_usuario==true || $verifica_setor==true){
                    return view('processo.edit', ['processo' => $processo,'log' => $log]);
                }else{
                    abort(401);
                }
            }

        /*Diferente do tipo privado caso o cidadão ou o colaborador não faça parte do processo como autor/tramitação
        então o usuário é redirecionado para visualização da proposta e não para a edição, limitando assim o seu acesso. */

        } if($processo->tipo=="Público"){

            if($tipo_usuario=="cidadao"){
                if($verifica_usuario==true){
                    return view('processo.edit', ['processo' => $processo,'log' => $log]);
                }else{
                    return Redirect::to('processo/'.$id);
                }
            }else{
                $verifica_setor = ParticipacaoProcesso::participacao_processo_setor($usuario_setor->fk_setor,$id);
                if($verifica_usuario==true || $verifica_setor==true){
                    return view('processo.edit', ['processo' => $processo,'log' => $log]);
                }else{
                    return Redirect::to('processo/'.$id);
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
            $log->status = "Dados do processo foram alteradas por: <b>".Auth::user()->nome."</b>";


            DB::transaction(function () use ($processo,$log) {
                $processo->save();
                $log->save();
            });

            Session::flash('message_sucesso', 'Dados alterados.');
            return Redirect::to('processo/' . $processo->id . '/edit');
        } catch (\Exception  $erro) {
            Session::flash('message_erro', 'Não foi possível alterar os dados do processo, tente novamente mais tarde.!');
            return back()->withInput();
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
}
