<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use DataTables;

use App\Secretaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('secretaria.index');
    }


    public function list(Request $request)
    {
        $secretaria = Secretaria::where('status', 'Ativo')->get();

        return DataTables::of($secretaria)
            ->editColumn('acao', function ($secretaria) {
                return $this->setEstrutura($secretaria);
            })->escapeColumns([0])
            ->make(true);
    }

    private function setEstrutura(Secretaria $modelo)
    {

        $btnEditar = ' <a  class="btn btn-default btn-xs btnEditar"
                          href="secretaria/' . $modelo->id . '"
                          title="Alterar Modelo" data-toggle="tooltip">&nbsp
                          <i class="fa fa-fw fa-pencil-square-o fa-lg"></i>&nbsp
                       </a>';

        $btnExcluir =  ' <a title="Excluir " data-toggle="tooltip"
                           class="btn btn-default btn-xs btnExcluir"
                            data-id="' . $modelo->id . '" >&nbsp
                            <i  class="fa fa-fw fa-trash-o fa-lg"></i>&nbsp
                       </a>';

        return $btnEditar . $btnExcluir;
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
            $secretaria = new Secretaria();

            $secretaria->titulo = $request->titulo;
            $secretaria->sigla = $request->sigla;
            $secretaria->status = 'Ativo';

            $secretaria->save();

            Session::flash('message', 'Secretaria criada!');
            return Redirect::to('secretaria');
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }

    public function create()
    {
        return View::make('secretaria.create');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $secretaria = Secretaria::find($id);

        return View::make('secretaria.show')
            ->with('secretaria', $secretaria);
    }


    public function edit($id)
    {
        $secretaria = Secretaria::find($id);

        return View::make('secretaria.edit')
            ->with('secretaria', $secretaria);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $secretaria = Secretaria::find($id);

            $secretaria->titulo = isset($request->titulo) ? $request->titulo : $secretaria->titulo;
            $secretaria->sigla = isset($request->sigla) ? $request->sigla : $secretaria->sigla;

            $secretaria->save();

            // redirect
            Session::flash('message', 'Secretaria atualizada!');
            return Redirect::to('secretaria');
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $secretaria = Secretaria::find($id);
        $secretaria->status = 'Inativo';
        $secretaria->save();

        return response()->json(array('status' => "OK"));
    }
}
