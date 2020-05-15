<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestModelo;
use App\Http\Requests;

use Response;
use DataTables;
use DB;
use Hash;
use Auth;
use Validator;
use Image;
use Storage;
#class

use App\ModeloDocumento;

use App\Http\Utility\BotoesDatatable;

class ModeloDocumentoController extends Controller
{
    public function index()
    {
        return view('ModeloDocumento.listar_modelo');
    }

    public function novo()
    {
        return view('ModeloDocumento.create');
    }

    public function editar(Request $request)
    {
        $modelo = ModeloDocumento::where('id', $request->id)

            ->where('status', 'Ativo')->get();
        return view('ModeloDocumento.edit', compact('modelo'));
    }

    public function list(Request $request)
    {
        $modelo = ModeloDocumento::where('status', "Ativo")->get();

        return Datatables::of($modelo)
            ->editColumn('acao', function ($modelo) {
                return $this->setEstrutura($modelo);
            })->escapeColumns([0])
            ->make(true);
    }

    private function setEstrutura(ModeloDocumento $modelo)
    {

        return '<div class="btn-group btn-group-sm">
                        <a href="javascript:void(0)"
                            class="btn bg-teal color-palette btnVisualizar"
                            data-id="' . $modelo->id . '"
                            title="Visualizar" data-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href=route"("editar_modelo",["id"=>' . $modelo->id . '])"
                            class="btn btn-info"
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#"
                            class="btn bg-danger color-palette btnExcluir"
                            data-id="' . $modelo->id . '"
                            title="Excluir" data-toggle="tooltip">
                            <i class="fas fa-trash"></i>
                        </a>
                </div>';
    }

    public function store(RequestModelo $request)
    {

        try {
            $modelo =  new ModeloDocumento();
            $modelo->titulo = $request->titulo;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo) {
                $modelo->save();
            });

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('exception' => "ERRO " . $erro));
        }
    }

    public function update(RequestModelo $request)
    {
        try {
            $modelo = ModeloDocumento::find($request->id);
            $modelo->titulo = $request->titulo;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo) {
                $modelo->save();
            });

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('exception' => "ERRO " . $erro));
        }
    }

    public function inserir_imagem(Request $request)
    {

        if ($request->file('file')) {
            $arquivoNome = time() . '.' . $request->file('file')->getClientOriginalExtension();

            if ($request->file('file')->storeAs('public/imagem_summernote/', $arquivoNome)) {
                return response()->json($arquivoNome);
            } else {
                return Response::json(array('errors' => 'true'));
            }
        }
    }

    public function delete(Request $request)
    {
        if (!isset($request->id)) {
            return response()->json(array('status' => "error"));
        }
        $modelo = ModeloDocumento::find($request->id);
        $modelo->status = "Inativo";
        $modelo->save();
        return response()->json(array('status' => "OK"));
    }
}
