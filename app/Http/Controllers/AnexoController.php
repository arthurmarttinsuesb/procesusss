<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestAnexo;
use App\Http\Requests;

use Response;
use DataTables;
use DB;
use Auth;
use Validator;
use Storage;
use Session;
use Redirect;
use App\Http\Utility\BotoesDatatable;
#class

use App\ProcessoAnexo;
use App\ProcessoLog;


class AnexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestAnexo $request, $id)
    {

        try {
            $modelo =  new ProcessoAnexo();
            $modelo->titulo = $request->tipo;
            $modelo->tipo = "Público";
            $modelo->fk_user = Auth::id();
            $modelo->fk_processo = $id;


            $arquivoNome = time() . '.' . $request->file('arquivo')->getClientOriginalExtension();
            if ($request->file('arquivo')->storeAs('public/processo_anexos/', $arquivoNome)) {
                $modelo->arquivo = $arquivoNome;
            } else {
                Session::flash('message', 'Não foi possível enviar anexo, tente novamente mais tarde.!');
            }

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $id;
            $log->status = "Anexo ".$request->tipo." adicionado por: <b>".Auth::user()->nome."</b>";


            DB::transaction(function () use ($modelo,$log) {
                $modelo->save();
                $log->save();
            });

            return Response::json(array('status' => 'Ok'));
        } catch (\Exception  $errors) {
            // Session::flash('message', 'Não foi possível cadastrar, tente novamente mais tarde.!');
            // return back()->withInput();
            return Response::json(array('errors' => $errors));
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
        //
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

    public function autentica($id)
    {
        try {
            $modelo = ProcessoAnexo::find($id);
            $modelo->fk_user_atenticacao = Auth::user()->id;
            $modelo->save();

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $modelo->fk_processo;
            $log->status = "Anexo ".$modelo->titulo." autenticado por: <b>".Auth::user()->nome."</b>";
            $log->save();

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }

    public function list($id)
    {
        $modelo = ProcessoAnexo::where('fk_processo', $id)->where('status', 'Ativo')->get();
        return Datatables::of($modelo)
            ->editColumn('tipo', function ($modelo) {
                return $modelo->tipo;
            })
            ->editColumn('usuario', function ($modelo) {
                return isset($modelo->user->nome) ? $modelo->user->nome : '';
            })
            ->editColumn('fk_user_atenticacao', function ($modelo) {
                return isset($modelo->fk_user_atenticacao) ? $modelo->userAthenticated->nome : '(Sem autenticação)';
            })
            ->editColumn('acao', function ($modelo) {


                foreach(Auth::user()->getRoleNames() as $nome){
                    //se for do tipo cidadão retirar a autenticação
                    if($nome=="cidadao"){
                        
                        return '<div class="btn-group btn-group-sm">
                                    <a href="/anexo/' . $modelo->arquivo . '"
                                        class="btn bg-teal color-palette"
                                        title="Visualizar" data-toggle="tooltip" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#"
                                        class="btn bg-danger color-palette btnExcluirAnexo"
                                        data-id="' . $modelo->id . '"
                                        title="Excluir" data-toggle="tooltip">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>';
                    }else{

                        return '<div class="btn-group btn-group-sm">
                                    <a href="/anexo/' . $modelo->arquivo . '"
                                        class="btn bg-teal color-palette"
                                        title="Visualizar" data-toggle="tooltip" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#"
                                        class="btn bg-danger color-palette btnExcluirAnexo"
                                        data-id="' . $modelo->id . '"
                                        title="Excluir" data-toggle="tooltip">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <button type="button"
                                        class="btn bg-primary color-palette btnAutenticar"
                                        data-id="' . $modelo->id . '"
                                        title="Autenticar Documento" data-toggle="tooltip">
                                        <i class="fa fa-key"></i>
                                    </button>
                                </div>';
                    }
                }   

            })->escapeColumns([0])
            ->make(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $modelo = ProcessoAnexo::find($id);
            $modelo->status = 'Inativo';
            $modelo->save();

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $modelo->fk_processo;
            $log->status = "Anexo ".$modelo->titulo." excluído por: <b>".Auth::user()->nome."</b>";
            $log->save();

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}