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

class ModeloDocumentoController extends Controller
{
    public function index(){
        return view('ModeloDocumento.listar_modelo');
    }

    public function create()
    {
        return view('ModeloDocumento.create');
    }
    public function edit($id){
        $modelo = ModeloDocumento::where('id', $id)->where('status','Ativo')->first();
        return view('ModeloDocumento.edit',compact('modelo'));
    }

   
    public function list(Request $request){
        $modelo = ModeloDocumento::where('status', "Ativo")->get();

        return Datatables::of($modelo)
        ->editColumn('acao', function ($modelo) {
            return $this->setEstrutura($modelo);
        })->escapeColumns([0])
        ->make(true);
    } 

    private function setEstrutura(ModeloDocumento $modelo){

        return '<div class="btn-group btn-group-sm">
                        <a href="javascript:void(0)" 
                            class="btn bg-teal color-palette btnVisualizar"
                            data-id="'.$modelo->id.'"
                            title="Visualizar" data-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="modelo-documento/'.$modelo->id.'/edit"
                            class="btn btn-info" 
                            title="Alterar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a 
                            class="btn bg-danger color-palette btnExcluir"
                             data-id="'.$modelo->id.'"
                            title="Excluir" data-toggle="tooltip">
                            <i class="fas fa-trash"></i>
                        </a>
                </div>';
    }

    public function store(RequestModelo $request){
   
        try{
            $modelo =  new ModeloDocumento();
            $modelo->titulo = $request->titulo;
            // $modelo->conteudo = $request->conteudo;
            
            DB::transaction(function() use ($modelo) {
                $modelo->save();
            });

            Session::flash('message', 'Modelo criado!');
            return Redirect::to('modelo-documento');
        }catch(\Exception  $errors){
            return response()->json(array('errors' => "Não foi possível editar, tente novamente mais tarde."));
        }
    }

    public function update(RequestModelo $request){
            try{
                $modelo = ModeloDocumento::find($request->id);
                $modelo->titulo = $request->titulo;
                $modelo->conteudo = $request->conteudo;
                    
                DB::transaction(function() use ($modelo) {
                    $modelo->save();
                });

                Session::flash('message', 'Modelo criado!');
                return Redirect::to('modelo-documento');
            }catch(\Exception  $erro){
                return response()->json(array('errors' => "Não foi possível editar, tente novamente mais tarde."));
            }
    }

    public function destroy($id){
        $modelo = ModeloDocumento::find($id);
        $modelo->status = "Inativo";
        $modelo->save();
        return response()->json(array('status' => "OK"));
    }

    public function inserir_imagem(Request $request){

        if ($request->file('file')) {
            $arquivoNome = time().'.'.$request->file('file')->getClientOriginalExtension();

            if($request->file('file')->storeAs('public/imagem_modelo/',$arquivoNome)){
               return response()->json($arquivoNome);
            }else{
               return Response::json(array('errors' => 'true'));
            }
            
        }
    }

    

}
