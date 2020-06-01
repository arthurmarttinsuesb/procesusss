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
    public function store(RequestAnexo $request,$id)
    {

        try {
            $modelo =  new ProcessoAnexo();
            $modelo->titulo = $request->tipo;
            $modelo->fk_user = Auth::id();
            $modelo->fk_processo = $id;
            

            $arquivoNome = time() . '.' . $request->file('arquivo')->getClientOriginalExtension();
            if ($request->file('arquivo')->storeAs('public/processo_anexos/', $arquivoNome)) {
                $modelo->arquivo = $arquivoNome;
            } else {
                Session::flash('message', 'Não foi possível enviar anexo, tente novamente mais tarde.!');
            }

            DB::transaction(function () use ($modelo) {
                $modelo->save();
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

    public function list($id)
    {
        $modelo = ProcessoAnexo::where('fk_processo', $id)->where('status','Ativo')->get();
        return Datatables::of($modelo)
            ->editColumn('tipo', function ($modelo) {
                return $modelo->tipo;
            })
            ->editColumn('usuario', function ($modelo) {
                return $modelo->user->nome;
            })
            ->editColumn('acao', function ($modelo) {
                         return '<div class="btn-group btn-group-sm">
                                <a href="/anexo/' .$modelo->arquivo. '"
                                    class="btn bg-teal color-palette"
                                    title="Visualizar" data-toggle="tooltip" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#"
                                    class="btn bg-danger color-palette btnExcluirAnexo"
                                    data-id="'.$modelo->id.'"
                                    title="Excluir" data-toggle="tooltip">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>';
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

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}
