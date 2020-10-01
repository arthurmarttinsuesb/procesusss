<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use DataTables;

use Auth;
use DB;
use App\ProcessoDocumento;
use App\Processo;
use App\ProcessoAnexo;
use App\ProcessoTramitacao;
use App\Http\Utility\BotoesDatatable;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class ConsultarProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('consultarProcesso.index');
    }

    public function list($busca)
    {
        $processo = DB::table('processos')
        ->join('users', 'processos.fk_user', '=', 'users.id')
        ->where('processos.numero', 'ILIKE', "%{$busca}%")
        ->orWhere('users.nome', 'ILIKE', "%{$busca}%")
        ->select('users.nome','processos.id','processos.numero','processos.tipo','processos.status')
        ->get();
       
        return DataTables::of($processo)->editColumn('acao', function ($processo) {
            if($processo->tipo=="Público"){
                foreach(Auth::user()->getRoleNames() as $nome){
                    //se for do tipo cidadão retirar a autenticação
                    if($nome!=="cidadao"){
                        return BotoesDatatable::criarBotaoVisualizar($processo->id, 'processo');
                    }
                }
            }else{
                return  '<span class="right badge badge-danger">Processo Privado</span>';
            }
        })
        ->editColumn('encaminhamento', function ($processo) {
            if($processo->status=='Ativo'){
                return  '<span class="right badge badge-success">em andamento</span>';
            } else if($processo->status=='Encaminhado'){
                return  '<span class="right badge badge-info">em andamento</span>';
            }else  if($processo->status=='Finalizado'){
                return  '<span class="right badge badge-danger">encerrado</span>';
            }
        })
        ->editColumn('status', function ($processo) {
            if($processo->status=='Ativo'){
                return  '<span class="right badge badge-success">em andamento</span>';
            } else if($processo->status=='Encaminhado'){
                return  '<span class="right badge badge-info">em andamento</span>';
            }else  if($processo->status=='Finalizado'){
                return  '<span class="right badge badge-danger">encerrado</span>';
            }
        })
        ->escapeColumns([0])->make(true);
    }
}