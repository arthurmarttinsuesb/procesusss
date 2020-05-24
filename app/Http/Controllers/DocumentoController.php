<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestDocumento;
use Illuminate\Support\Facades\Input;

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

use App\Processo;
use App\ProcessoDocumento;
use App\ModeloDocumento;
use App\DocumentoTramite;

use App\Http\Utility\BotoesDatatable;

class DocumentoController extends Controller
{
    public function show($id)
    {
        $tipo = ModeloDocumento::where('status', "Ativo")->get();
        $processo = Processo::where('id', $id)->first();
        return view('documento.create',compact('id','tipo','processo'));
    }
    public function edit($id)
    {   
        $tipo = ModeloDocumento::where('status', "Ativo")->get();
        $modelo = ProcessoDocumento::where('id', $id)->where('status', 'Ativo')->first();
        return view('documento.edit', compact('modelo','tipo'));
    }

    public function list($id)
    {
        $modelo = ProcessoDocumento::where('fk_processo', $id)->where('status','Ativo')->get();

        return Datatables::of($modelo)
            ->editColumn('tipo', function ($modelo) {
                return $modelo->modelo_documento->titulo;
            })
            ->editColumn('status', function ($modelo) {
                $documento_tramite = DocumentoTramite::where('fk_processo_documento', $modelo->id)->get();
                if($documento_tramite->count()==0){
                    return  '<span class="right badge badge-success">criado</span>';
                }else{
                    return  '<span class="right badge badge-info">encaminhado</span>';
                }
            })
            ->editColumn('acao', function ($modelo) {
                return BotoesDatatable::criarBotoes($modelo->id, 'documento');
            })->escapeColumns([0])
            ->make(true);
    }

    public function store(RequestDocumento $request)
    {
        try {
            $modelo =  new ProcessoDocumento();
            $modelo->fk_processo = $request->processo;
            $modelo->fk_user = Auth::user()->id;
            $modelo->fk_modelo_documento = $request->tipo;
            $modelo->titulo = $request->titulo;
            $modelo->descricao = $request->descricao;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo) {
                $modelo->save();
            });

            Session::flash('message', 'Documento criado!');
            return Redirect::to('processo/'.$request->processo.'/edit');
        } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível cadastrar documento, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }

    public function update(RequestDocumento $request,$id)
    {
        try {
            $modelo = ProcessoDocumento::find($id);
            $modelo->fk_modelo_documento = $request->tipo;
            $modelo->titulo = $request->titulo;
            $modelo->descricao = $request->descricao;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo) {
                $modelo->save();
            });

            Session::flash('message', 'Documento Alterado!');
            return Redirect::to('processo/'.$modelo->fk_processo.'/edit');
        } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível alterar documento, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }

    public function preencher(Request $request){
        $modeloDocumento = ModeloDocumento::where('id', $request->tipo)->first();
        return $modeloDocumento->conteudo;
    }

    public function destroy($id)
    {
        try {
            $modelo = ProcessoDocumento::find($id);
            $modelo->status = 'Inativo';
            $modelo->save();

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}
