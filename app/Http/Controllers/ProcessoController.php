<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


use Auth;
use DataTables;

use Session;
use Redirect;
#class

use App\Processo;
use App\User;
use App\Setor;
use App\DocumentoTramite;
use App\ProcessoLog;
use App\Http\Utility\BotoesDatatable;

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
                    return  '<span class="right badge badge-success">criado</span>';
                } else if($processos->status=='Encaminhado'){
                    return  '<span class="right badge badge-info">encaminhado</span>';
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
        //
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
        $setores = Setor::where('status', 'Ativo')->get();
        $users = User::where('status', 'Ativo')->get();
        $log = ProcessoLog::where('fk_processo', $id)->paginate(10);

        return view('processo.edit', ['processo' => $processo, 'setores' => $setores, 'users' => $users,'log' => $log]);
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
        //
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
