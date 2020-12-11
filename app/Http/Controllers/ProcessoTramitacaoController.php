<?php

namespace App\Http\Controllers;

use Response;
use Auth;
use DataTables;
use DB;
use Mail;
use Illuminate\Http\Request;
use App\Mail\ProcessoRecebidoUser;
use App\Mail\ProcessoRecebidoSetor;
use App\User;
use App\Setor;
use App\ProcessoDocumento;
use App\ProcessoTramitacao;
use App\ProcessoLog;
use App\ProcessoAnexo;
use App\Processo;
use App\Secretaria;

use App\Http\Utility\BotoesDatatable;

class ProcessoTramitacaoController extends Controller
{

    public function create($processo,ProcessoTramitacao $tramitacao) {
        $setores = Setor::where('status', 'Ativo')->get();
        $secretarias = Secretaria::where('status', 'Ativo')->get();
        $users = User::where('status', 'Ativo')->role(['administrador','funcionario'])->get();
        $processo = Processo::firstWhere('numero', $processo);

        if(empty($tramitacao->id)){
            $tramite="";
        }else{
            $tramite=$tramitacao;
        }

        return view('processo.tramite.create',compact('processo','setores','users','tramite','secretarias'));
    }


    public function list(Request $request, $processo)
    {
        try {
            $tramites = ProcessoTramitacao::where('fk_processo', $processo)->with('user')->with('setor')->with('processo')->get();
            return Datatables::of($tramites)
                ->editColumn('tramite', function ($tramites) {
                    return isset($tramites->fk_user) ? 'Enviado para: <b>'.$tramites->user->nome.'</b> - '.date('d/m/Y H:s',strtotime($tramites->created_at)) : 'Enviado para: <b>'.$tramites->setor->titulo.'</b> - '.date('d/m/Y H:s',strtotime($tramites->created_at));
                })
                ->editColumn('criado', function ($tramites) {
                    return  $tramites->created_at;

                })
                ->escapeColumns([0])
                ->make(true);
        } catch (\Exception  $erro) {
            return false;
        }
    }



    // public function index(Request $request, $processo)
    // {
    //     try {
    //         $tramites = ProcessoTramitacao::where('fk_processo', $processo)->where('status','Criado')->with('user')->with('setor')->with('processo')->get();
    //         return Datatables::of($tramites)
    //             ->editColumn('acao', function ($tramite) {
    //                 $tramiteRoute = "processo/" . $tramite->fk_processo . "/tramite";
    //                 return BotoesDatatable::criarBotoes($tramite->id, $tramiteRoute, 'btnExcluirTramite', 'deletar', $tramite->status);
    //             })
    //             ->editColumn('usuario', function ($user) {
    //                 return isset($user->user->nome) ? $user->user->nome : 'não possui';
    //             })
    //             ->editColumn('setor', function ($setor) {
    //                 return isset($setor->setor->titulo) ? $setor->setor->titulo : 'não possui';
    //             })
    //             ->escapeColumns([0])
    //             ->make(true);
    //     } catch (\Exception  $erro) {
    //         return false;
    //     }
    // }

    public function store(Request $request)
    {
        try {
            $fk_setor = $request->fk_setor;
            $fk_user = $request->fk_user;

            if ($fk_user == 'selecione') {
                $fk_user = null;
            }

            if ($fk_setor == 'selecione') {
                $fk_setor = null;
            }

            $processo = Processo::firstWhere('numero',$request->processo);
            $processo_documento = ProcessoDocumento::where('fk_processo',$processo->id)->get();

            /** verico se o processo já possui algum documento, caso não tenha eu não deixo o processo
             * ser encaminhado;
             */

        if($processo_documento->count()>0){

            /** crio um novo tramite  */
            $tramite = new ProcessoTramitacao();
            $tramite->fk_user_remetente = Auth::user()->id;
            $tramite->fk_setor = $fk_setor;
            $tramite->fk_user = $fk_user;
            $tramite->fk_processo = $processo->id;

            /** verifico pra onde foi enviado o processo, e mostro no log especificando se foi setor ou usuário;*/

            if($fk_setor==null){
                $user = User::find($fk_user);
                $status_log = "Processo encaminhado de: <b>".Auth::user()->nome."</b>  para: <b>".$user->nome."</b>, para verificar ".$request->instrucao;
                try{
                    Mail::to($user->email)->send(new ProcessoRecebidoUser($user));
                }catch(\Exception $erro){
                    return response()->json(array($erro.'erro' => "ERRO_EMAIL"));
                }
            }else{
                $setor = Setor::find($fk_setor);
                $status_log = "Processo encaminhado de: <b>".Auth::user()->nome."</b>  para: <b>".$setor->titulo."</b>, para verificar ".$request->instrucao;

                // try{
                //     Mail::to($setor->email)->send(new ProcessoRecebidoSetor($setor));
                // }catch(\Exception $erro){
                //     return response()->json(array($erro.'erro' => "ERRO_EMAIL"));
                // }
            }

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $processo->id;
            $log->status = $status_log;


            DB::transaction(function () use ($tramite,$processo,$log,$request) {
                $tramite->save();
                $log->save();

                ProcessoAnexo::where('fk_processo',$processo->id)->where('fk_user',Auth::user()->id)->update(['tramite' => 'Bloqueado']);
                ProcessoDocumento::where('fk_processo',$processo->id)->where('fk_user',Auth::user()->id)->update(['tramite' => 'Bloqueado']);

                if($request->tramitacao!==null){
                    $tramite_atual = ProcessoTramitacao::find($request->tramitacao);
                    $tramite_atual->status = "Bloqueado";
                    $tramite_atual->save();
                }else{
                    $processo->tramite = "Bloqueado";
                    $processo->save();
                }

            });

                return Response::json(array('status' => 'Ok'));

            }else{
                return Response::json(array('status' => 'Assinatura'));
            }

        } catch (\Exception  $erro) {
            return Response::json(array('errors' => $erro));
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idProcesso, $idTramite)
    {
        try {
            $tramite = ProcessoTramitacao::find($idTramite);
            $tramite->status = 'Inativo';
            $tramite->save();

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $tramite->fk_processo;
            $log->status = "Encaminhamento do Processo removido por: <b>".Auth::user()->nome."</b>";
            $log->save();

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}
