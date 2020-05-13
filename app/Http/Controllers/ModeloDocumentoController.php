<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

class ModeloDocumentoController extends Controller
{
    public function index(){
        return view('ModeloDocumento.listar_modelo');
    }

    public function novo(){
        $modelo="novo";
        return view('ModeloDocumento.criar_editar_modelo',compact('modelo'));
    }

    public function editar(Request $request){
        $modelo = ModeloDocumento::where('id', $request->id)

        ->where('status','Ativo')->get();

        return view('ModeloDocumento.criar_editar',compact('modelo'));
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
       
       $btnEditar = ' <a  class="btn btn-default btn-xs btnEditar" 
                         href="modelodocumento/editar/'.$modelo->id.'"
                         title="Alterar Modelo" data-toggle="tooltip">&nbsp
                         <i class="fa fa-fw fa-pencil-square-o fa-lg"></i>&nbsp
                      </a>';
  
      $btnExcluir =  ' <a title="Excluir Modelo" data-toggle="tooltip"  
                          class="btn btn-default btn-xs btnExcluir"
                           data-id="'.$modelo->id.'" >&nbsp
                           <i  class="fa fa-fw fa-trash-o fa-lg"></i>&nbsp
                      </a>';

     return $btnEditar.$btnExcluir;
    }

    public function store(Request $request){
   
    // Regras para validação do edital com onus e sem onus
        $rules = array(
        'tipo' =>'required',
        'conteudo' => 'required');
    
            $attributeNames = array(
                'tipo' =>'Tipo de Modelo',
                'conteudo' => 'Conteúdo do Modelo',
            );

            $validator = Validator::make(Input::all(), $rules);
            $validator->setAttributeNames($attributeNames);

        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));

        else {
            try{
                $modelo =  new ModeloDocumento();
                $modelo->tipo = $request->tipo;
                $modelo->conteudo = $request->conteudo;
                
                DB::transaction(function() use ($modelo) {
                    $modelo->save();
                });

                return response()->json(array('status' => "OK"));
            }catch(\Exception  $erro){
                return response()->json(array('exception' => "ERRO ".$erro));
            }
        }
    }

    public function update(Request $request){
        // Regras para validação do edital com onus e sem onus
        $rules = array(
            'tipo' =>'required',
            'conteudo' => 'required');
        
            $attributeNames = array(
                'tipo' =>'Tipo de Modelo',
                'conteudo' => 'Conteúdo do Modelo',
            );

            $validator = Validator::make(Input::all(), $rules);
            $validator->setAttributeNames($attributeNames);

        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {
            try{
                $modelo = ModeloDocumento::find($request->id);
                $modelo->tipo = $request->tipo;
                $modelo->conteudo = $request->conteudo;
                    
                DB::transaction(function() use ($modelo) {
                    $modelo->save();
                });

                return response()->json(array('status' => "OK"));
            }catch(\Exception  $erro){
                return response()->json(array('exception' => "ERRO ".$erro));
            }
        }
    }

    public function inserir_imagem(Request $request){

        if ($request->file('file')) {
            $arquivoNome = time().'.'.$request->file('file')->getClientOriginalExtension();

            if($request->file('file')->storeAs('public/imagem_summernote/',$arquivoNome)){
               return response()->json($arquivoNome);
            }else{
               return Response::json(array('errors' => 'true'));
            }
            
        }
    }

    public function delete(Request $request){
        if(!isset($request->id)){
            return response()->json(array('status' => "error"));
        }
        $modelo = ModeloDocumento::find($request->id);
        $modelo->status = "Inativo";
        $modelo->save();
        return response()->json(array('status' => "OK"));
    }

}
