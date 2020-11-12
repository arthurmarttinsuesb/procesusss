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
                                <a href="/processo/' . $processo->numero . '/edit"
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
        $processo = Processo::firstWhere('numero',$id);

        //verifico qual o tipo de usuário logado
        $tipo_usuario = Str::of(Auth::user()->getRoleNames())->replaceMatches('/[^A-Za-z0-9]++/', '');

        //verifico se o usuário logado é cidadão
            if($tipo_usuario!=="cidadao" || $processo->fk_user == Auth::user()->id){

                $processo_anexo = ProcessoAnexo::where('fk_processo', $processo->id)->where('status', 'Ativo')->get();
                $processo_documento = ProcessoDocumento::where('fk_processo', $processo->id)->where('status','Ativo')->get();
                $processo_tramitacao = ProcessoTramitacao::where('fk_processo', $processo->id)->where('status','Criado')->with('user')->with('setor')->with('processo')->get();
                $log = ProcessoLog::where('fk_processo', $processo->id)->paginate(10);

                return view('processo.show',compact('processo','log','processo_documento','processo_anexo','processo_tramitacao'));
            }else{
                abort(401);
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
        $processo = Processo::firstWhere('numero',$id);

        if(!isset($processo)){
            abort(404);
        }else{
            $log = ProcessoLog::where('fk_processo', $processo->id)->get();

            /* Independente do tipo de usuário, se sou autor do processo e tenho o tramite = Liberado (Tenho acesso a editar o processo), caso o tramite = Bloqueado (Mesmo sendo autor, só tenho acesso a visualizar o processo)*/
            if($processo->fk_user==Auth::user()->id && $processo->tramite=="Liberado"){
                return view('processo.edit', ['processo' => $processo,'log' => $log, 'tramite'=>""]);
            }else if($processo->fk_user==Auth::user()->id && $processo->tramite=="Bloqueado"){
                return Redirect::to('processo/'.$processo->numero);
            }else {

            //verifico qual o tipo de usuário logado
            $tipo_usuario = Str::of(Auth::user()->getRoleNames())->replaceMatches('/[^A-Za-z0-9]++/', '');

            /*Confiro qual o tipo de usuário logado, se for do tipo cidadão faço as seguintes 
            verificações para determinar o tipo de acesso:
                1º - não é autor do processo+teor= Público (Pode acessar a tela de consulta)
                2º - não é autor do processo+teor= Privado (Redirecionado para a página de erro 401 que é de permissão negada) */

            if($tipo_usuario=="cidadao"){
                if($processo->fk_user!==Auth::user()->id && $processo->tipo=="Público"){
                    return Redirect::to('processo/'.$processo->numero);
                }else if($processo->fk_user!==Auth::user()->id && $processo->tipo=="Privado"){
                    abort(401);
                }
            }else{

                //verifico o setor no qual o colaborador está lotado.
                $usuario_setor = UserSetor::where('fk_user', Auth::user()->id)->where('status','Ativo')->first();

                /* para liberar o acesso ao usuário do tipo colaborador preciso realizar as devidas verificações na tabela de tramitação
                - Preciso saber se o usuário faz parte do processo, seja como usuário direto ou como parte do setor com o status dessa tramitação bloqueada ou não*/
                $processo_tramitacao_user_livre = ProcessoTramitacao::where('fk_processo', $processo->id)->where('fk_user',Auth::user()->id)->where('status','Criado')->first();
                
                $processo_tramitacao_user_bloqueado = ProcessoTramitacao::where('fk_processo', $processo->id)->where('fk_user',Auth::user()->id)->where('status','Bloqueado')->first();
                
                $processo_tramitacao_setor_livre = ProcessoTramitacao::where('fk_setor', $usuario_setor->fk_setor)->where('fk_processo', $processo->id)->where('status','Criado')->first();

                $processo_tramitacao_setor_bloqueado = ProcessoTramitacao::where('fk_setor', $usuario_setor->fk_setor)->where('fk_processo', $processo->id)->where('status','Bloqueado')->first();

                /*Apesar das repetições quanto ao acesso ao banco nessa etapa eu confirmo se:
                1º Se o usuário com o seu ID faz parte da tramitação e seu status = Criado (Libero o acesso para editar o processo);
                2º Se o usuário com o seu ID faz parte da tramiatação mais o seu status = Bloqueado (Libero acesso somente para visualizar o processo);
                3º Caso o processo foi enviado para o setor do usuário e o status da tramitação = Criado (É liberada o acesso a qualquer usuário que faça parte do setor e qualquer um pode fazer as devidas observações e alterações)
                4º O processo passou pelo setor mais o status da tramitação = Bloqueado (Liberado somente a visualização)
                5º Caso nenhuma dessas vericações sejam true, então partimos para o ultimo else que nesse caso o usuário não se faz participante de nenhuma forma do processo mais quer te acesso, diante disso observamos se o processo tem o teor público ou privado, se for público pode visualizar se for privado é enviado para a página de erro 401 que apresenta a mensagem de acesso não autorizado. */
                if(isset($processo_tramitacao_user_livre)){
                    return view('processo.edit', ['processo' => $processo,'log' => $log,'tramite'=>$processo_tramitacao_user_livre->id]);
                }else if(isset($processo_tramitacao_user_bloqueado)){
                    return Redirect::to('processo/'.$processo->numero);
                }else if(isset($processo_tramitacao_setor_livre)){
                    return view('processo.edit', ['processo' => $processo,'log' => $log,'tramite'=>$processo_tramitacao_setor_livre->id]);
                }else if(isset($processo_tramitacao_setor_bloqueado)){
                    return Redirect::to('processo/'.$processo->numero);
                }else{
                    if($processo->tipo=="Público"){
                        return Redirect::to('processo/'.$processo->numero);
                    }else if($processo->tipo=="Privado"){
                        abort(401);
                    }
                }
            }
        }
    }


        //  /*criei uma função para verificar se o usuário logado está participando do processo, 
        //  seja como autor ou na tramitação*/
        // $verifica_usuario = ParticipacaoProcesso::participacao_processo_user(Auth::user()->id,$id);
       
       
        // /*Verifico se o processo é privado, se for e o usuário for do tipo cidadão utilizo a função que consulta 
        //  as tabelas necessárias para saber se o usuário faz parte do processo, se ele fizer pode acessar
        //  o caminho determinado, se não ele é redirecionado para uma página que informa que ele 
        //  não possui autorização de acesso a essa página, a mesma verificação é feita para o usuário 
        //  que é colaborador/funcionário */

        // if($processo->tipo=="Privado"){
        //     if($tipo_usuario=="cidadao"){
        //         if($verifica_usuario==true){
        //             return view('processo.edit', ['processo' => $processo,'log' => $log]);
        //         }else{
        //             abort(401);
        //         }
        //     }else{
        //         $verifica_setor = ParticipacaoProcesso::participacao_processo_setor($usuario_setor->fk_setor,$id);

        //         if($verifica_usuario==true || $verifica_setor==true){
        //             return view('processo.edit', ['processo' => $processo,'log' => $log]);
        //         }else{
        //             abort(401);
        //         }
        //     }

        // /*Diferente do tipo privado caso o cidadão ou o colaborador não faça parte do processo como autor/tramitação
        // então o usuário é redirecionado para visualização da proposta e não para a edição, limitando assim o seu acesso. */

        // } if($processo->tipo=="Público"){

        //     if($tipo_usuario=="cidadao"){
        //         if($verifica_usuario==true){
        //             return view('processo.edit', ['processo' => $processo,'log' => $log]);
        //         }else{
        //             return Redirect::to('processo/'.$id);
        //         }
        //     }else{
        //         $verifica_setor = ParticipacaoProcesso::participacao_processo_setor($usuario_setor->fk_setor,$id);
        //         if($verifica_usuario==true || $verifica_setor==true){
        //             return view('processo.edit', ['processo' => $processo,'log' => $log]);
        //         }else{
        //             return Redirect::to('processo/'.$id);
        //         }
        //     }
        // }
        
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


    public function devolver($id)
    {
        try {
            $processo = Processo::find($id);
            $processo->tramite = "Liberado";
            $processo->status = "Ativo";

            DB::transaction(function () use ($processo) {
                $processo->save();
            });

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }

    public function encerrar($id)
    {
        try {
            $processo = Processo::find($id);
            $processo->status = "Encerrado";
            $processo->tramite = "Encerrado";

            DB::transaction(function () use ($processo) {
                $processo->save();
            });

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
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
