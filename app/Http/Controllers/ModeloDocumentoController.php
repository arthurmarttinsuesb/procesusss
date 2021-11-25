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

class ModeloDocumentoController extends Controller
{
    public function index()
    {
        return view('modeloDocumento.index');
    }

    public function create()
    {

        /** se o usuário quiser criar um novo modelo o sistema irá redirecioná-lo para 
         * criar um modelo próprio e não um geral
         */
        if(Auth::user()->hasRole('administrador')){
            return view('modeloDocumento.create');
        }else{
            return view('MeuModelo.create');
        }

        
    }
    public function edit($slug)
    {

        /** caso alguém que não seja o administrador tente alterar o modelo de documento
         * o sistema apresentará uma mensagem de erro de permissão.
         */
        $modelo = ModeloDocumento::where('slug', $slug)->first();
        if(Auth::user()->hasRole('administrador')){
            return view('modeloDocumento.edit', compact('modelo'));
        }else{
            abort(401);
        }
    }


    public function list(Request $request)
    {
        $modelo = ModeloDocumento::where('fk_user', NULL)->get();
        $user = Auth::user();
        if ($user->hasRole('administrador')) {
            return Datatables::of($modelo)
                ->editColumn('acao', function ($modelo) {
                    return '<div class="btn-group btn-group-sm">
                                <a href="/pdf/modelo-documento/'.$modelo->slug.'"
                                class="btn bg-teal color-palette"
                                title="Visualizar" data-toggle="tooltip" target="_blank">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/modelo-documento/'.$modelo->slug.'/edit"
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
                    return BotoesDatatable::criarBotoes($modelo->id, 'modelo-documento');
                })->escapeColumns([0])
                ->make(true);
        }
        else{
            return Datatables::of($modelo)
            ->editColumn('acao', function ($modelo) {
                return '<div class="btn-group btn-group-sm">
                            <a href="/pdf/modelo-documento/'.$modelo->slug.'"
                            class="btn bg-teal color-palette"
                            title="Visualizar" data-toggle="tooltip" target="_blank">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>';
                // return BotoesDatatable::criarBotoes($modelo->id, 'modelo-documento');
            })->escapeColumns([0])
            ->make(true);
        }
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

            Session::flash('message', 'Modelo criado!');
            return Redirect::to('modelo-documento');
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
            return Redirect::to('modelo-documento');
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

    public function inserir_imagem(Request $request)
    {
        if ($request->file('file')) {
            $arquivoNome = time() . '.' . $request->file('file')->getClientOriginalExtension();
            if ($request->file('file')->storeAs('public/imagem_modelo/', $arquivoNome)) {
                return response()->json($arquivoNome);
            } else {
                return Response::json(array('errors' => 'true'));
            }
        }
    }

    public function remover_imagem(Request $request)
    {
        try {
            unlink(public_path($request->local));
        } catch (\Exception  $erro) {
            return Response::json(array('errors' => 'true'));
        }
    }
}
