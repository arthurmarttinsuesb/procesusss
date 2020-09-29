<?php

namespace App\Http\Controllers;

use Response;
use Auth;
use DataTables;
use Illuminate\Http\Request;

use App\ProcessoTramitacao;
use App\ProcessoLog;
use App\Http\Utility\BotoesDatatable;

class ProcessoTramitacaoController extends Controller
{

    public function index(Request $request, $processo)
    {
        try {
            $tramites = ProcessoTramitacao::where('fk_processo', $processo)->where('status','Criado')->with('user')->with('setor')->with('processo')->get();
            return Datatables::of($tramites)
                ->editColumn('acao', function ($tramite) {
                    $tramiteRoute = "processo/" . $tramite->fk_processo . "/tramite";
                    return BotoesDatatable::criarBotoes($tramite->id, $tramiteRoute, 'btnExcluirTramite', 'deletar', $tramite->status);
                })
                ->editColumn('usuario', function ($user) {
                    return isset($user->user->nome) ? $user->user->nome : 'não possui';
                })
                ->editColumn('setor', function ($setor) {
                    return isset($setor->setor->titulo) ? $setor->setor->titulo : 'não possui';
                })
                ->escapeColumns([0])
                ->make(true);
        } catch (\Exception  $erro) {
            return false;
        }
    }

    public function store(Request $request, $processo)
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

            $tramite = new ProcessoTramitacao();
            $tramite->fk_setor = $fk_setor;
            $tramite->fk_user = $fk_user;
            $tramite->fk_processo = $processo;

            $tramite->save();

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $processo;
            $log->status = "Processo encaminhado por: <b>".Auth::user()->nome."</b>";
            $log->save();

            return Response::json(array('status' => 'Ok'));
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