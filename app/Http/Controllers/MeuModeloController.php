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

use Session;
use Redirect;
#class

use App\ModeloDocumento;

use App\Http\Utility\BotoesDatatable;

class MeuModeloController extends Controller
{
    public function index()
    {
        return view('MeuModelo.index');
    }

    public function create()
    {
        return view('MeuModelo.create');
    }
    public function edit($slug)
    {
        $modelo = ModeloDocumento::where('slug', $slug)->first();

        /** o modelo pode ser alterado sob 2 condições
         * 1 - se o usuário for autor(a) do modelo;
         * 2 - se o usuário for diferente do autor(a), mais o arquivo possui o compatilhamento com o setor
         */ 
        if(($modelo->fk_user != Auth::user()->id && $modelo->compartilhar_setor == 'compartilhado') || ($modelo->fk_user == Auth::user()->id)){
            return view('MeuModelo.edit', compact('modelo'));
        }else{
            abort(401);
        }
    }


    public function list(Request $request)
    {
        $modelo = ModeloDocumento::where('fk_user', Auth::user()->id)->get();
            return Datatables::of($modelo)
                ->editColumn('acao', function ($modelo) {
                    return '<div class="btn-group btn-group-sm">
                                <a href="/pdf/meu-modelo/'.$modelo->slug.'"
                                class="btn bg-teal color-palette"
                                title="Visualizar" data-toggle="tooltip" target="_blank">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/meu-modelo/'.$modelo->slug.'/edit"
                                class="btn btn-info"
                                title="Alterar" data-toggle="tooltip">
                                <i class="fas fa-pencil-alt"></i>
                            </a> 
                            <a href="#"
                                class="btn bg-danger color-palette btnExcluir"
                                data-id="'.$modelo->id.'"
                                title="Excluir" data-toggle="tooltip">
                                <i class="fas fa-trash"></i>
                            </a>

                        </div>';
                    return BotoesDatatable::criarBotoes($modelo->id, 'meu-modelo');
                })->escapeColumns([0])
                ->make(true);
      
    }

    public function store(RequestModelo $request)
    {
        try {
            $modelo =  new ModeloDocumento();
            $modelo->titulo = $request->titulo;
            $modelo->fk_user = Auth::user()->id;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo) {
                $modelo->save();
            });

            Session::flash('message', 'Modelo criado!');
            return Redirect::to('meu-modelo');
        } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível cadastrar, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $modelo = ModeloDocumento::find($id);
            $modelo->titulo = $request->titulo;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo) {
                $modelo->save();
            });

            Session::flash('message', 'Modelo Alterado!');
            return Redirect::to('meu-modelo');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível alterar, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $modelo =  ModeloDocumento::destroy($id);
            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "$erro"));
        }
    }

}
