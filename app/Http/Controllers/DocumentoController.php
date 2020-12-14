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

use App\UserSetor;
use App\Processo;
use App\ProcessoDocumento;
use App\ProcessoLog;
use App\ModeloDocumento;
use App\DocumentoTramite;
use App\DocumentoAssinatura;

use App\Http\Utility\BotoesDatatable;

class DocumentoController extends Controller
{
    public function show($id)
    {

        $tipo = ModeloDocumento::where('status', "Ativo")->get();
        $processo = Processo::where('id', $id)->first();

        return view('processo.documento.create',compact('id','tipo','processo'));


    }
    public function edit($id)
    {
        $tipo = ModeloDocumento::where('status', "Ativo")->get();
        $modelo = ProcessoDocumento::where('id', $id)->where('fk_user', Auth::user()->id)->where('status', 'Ativo')->first();
        if(empty($modelo)){
            abort(401);
        }else{
            return view('processo.documento.edit', compact('modelo','tipo'));
        }
    }

    public function list($id)
    {
        $modelo = ProcessoDocumento::where('fk_processo', $id)->where('status','Ativo')->get();

        return Datatables::of($modelo)
            ->editColumn('tipo', function ($modelo) {
                return $modelo->tipo;
            })
            ->editColumn('status', function ($modelo) {
                $documento_tramite = DocumentoTramite::where('fk_processo_documento', $modelo->id)->where('status','!=','Inativo')->get();
                $documento_alt = DocumentoTramite::where('fk_processo_documento', $modelo->id)->where('status','Alterado')->get();
                $documento_devolvido = DocumentoTramite::where('fk_processo_documento', $modelo->id)->where('status','Devolvido')->get();

                if(($documento_tramite->count()==0 || $documento_alt->count()>0) && $documento_devolvido->count()==0){
                    return  '<span class="right badge badge-success">em andamento</span>';
                }else{
                    $documento_tramite_pendente = DocumentoTramite::where('fk_processo_documento', $modelo->id)->where('status','Pendente')->get();

                    if($documento_tramite_pendente->count()==0 &&  $documento_devolvido->count()==0){
                        return  '<span class="right badge badge-secondary">concluído</span>';
                    }else if($documento_devolvido->count()>0){
                        return  '<span class="right badge badge-warning">Devolvido</span>';
                    }else{
                        return  '<span class="right badge badge-info">enviado</span>';
                    }
                }
            })
            ->editColumn('acao', function ($modelo) {
                $visualizar = '<a href="/pdf/documento/'.$modelo->id.'"
                                    class="btn bg-teal color-palette"
                                    title="Visualizar" data-toggle="tooltip" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>';
                   $editar =   '<a href="/documento/'.$modelo->id.'/edit"
                                        class="btn btn-info"
                                        title="Editar" data-toggle="tooltip" target="_blank">
                                        <i class="fas fa-pencil-alt"></i>
                                </a>';
                $assinatura =   '<a href="#"
                                    class="btn bg-purple btnAssinarAutor"
                                    data-id="'.$modelo->id.'"
                                    title="Assinar Documento" data-toggle="tooltip">
                                    <i class="fas fa-user-edit"></i>
                                </a>';
               $encaminhar =  '<a href="/documento-tramite/create/'.$modelo->id.'"
                                            class="btn bg-gray"
                                            title="Enviar Documento" data-toggle="tooltip">
                                            <i class="fas fa-paper-plane"></i>
                                </a>';
                $excluir = ' <a href="#"
                                class="btn bg-danger color-palette btnExcluir"
                                data-id="'.$modelo->id.'"
                                title="Excluir" data-toggle="tooltip">
                                <i class="fas fa-trash"></i>
                            </a>';

                    //se o status do tramite do documento for liberado, pode ser fazer qualquer coisa ainda
                    //caso seja bloqueado só pode ser visualizado
                    if($modelo->tramite=="Liberado"){
                        $documento_tramite = DocumentoTramite::where('fk_processo_documento', $modelo->id)->where('status','!=','Inativo')->get();
                        $documento_devolvido = DocumentoTramite::where('fk_processo_documento', $modelo->id)->where('status','Devolvido')->get();
                        $documento_alt = DocumentoTramite::where('fk_processo_documento', $modelo->id)->where('status','Alterado')->get();
                        //se o documento estiver traminando o usuário não pode excluir ou editar.
                        if(($documento_tramite->count()==0 &&  $documento_devolvido->count()==0) || $documento_alt->count()>0){
                            return '<div class="btn-group btn-group-sm">
                                        '.$visualizar.$editar.$encaminhar.$assinatura.$excluir.'
                                    </div>';
                        } else if($documento_devolvido->count()>0){
                                return '<div class="btn-group btn-group-sm">
                                        '.$visualizar.$editar.$excluir.'
                                    </div>';
                        } else{
                            return '<div class="btn-group btn-group-sm">
                                    '.$visualizar.$encaminhar.'
                                </div>';
                        }
                    } else if($modelo->tramite=="Bloqueado"){

                        return '<div class="btn-group btn-group-sm">
                                    '.$visualizar.$encaminhar.'
                                </div>';
                    }
                    })->escapeColumns([0])
                    ->make(true);
    }

    public function listar_documentos()
    {
        $user = Auth::user();
        if ($user->hasRole('administrador') || $user->hasRole('funcionario')) {

            $setor  = UserSetor::where('fk_user', Auth::user()->id)->where('status', 'Ativo')->first();
            $documento  = DocumentoTramite::whereRaw("(fk_user='".Auth::user()->id."' OR fk_setor='".$setor->fk_setor."')")->where('status','Pendente')->orderBy('created_at','desc')->get();
            return view('documento.documento_lista', compact('documento'));
        }
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

            if($request->categoria == "privado"){
                $modelo->tipo = "Privado";
            }else {
                $modelo->tipo = "Público";
            }

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $request->processo;
            $log->status = 'Documento "'.$request->titulo.'" adicionado por: <b>'.Auth::user()->nome.'</b>';

            DB::transaction(function () use ($modelo,$log) {
                $modelo->save();
                $log->save();
            });

            Session::flash('message_sucesso', 'Documento criado!');
            Session::flash('tab', 'tab_documento');
            return Redirect::to('processo/'.$request->processo_numero.'/edit');
        } catch (\Exception  $errors) {
            Session::flash('message_erro', 'Não foi possível cadastrar documento, tente novamente mais tarde.!');
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

            $documento_tramite = DocumentoTramite::where('fk_processo_documento',$modelo->id)->where('status','Devolvido')->get();
            foreach($documento_tramite as $documento){
                $documento->status = 'Alterado';
                $documento->save();
            }

            if($request->categoria == "privado"){
                $modelo->tipo = "Privado";
            }else {
                $modelo->tipo = "Público";
            }

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $modelo->fk_processo;
            $log->status = 'Documento "'.$request->titulo.'" alterado por: <b>'.Auth::user()->nome.'</b>';

            DB::transaction(function () use ($modelo,$log) {
                $modelo->save();
                $log->save();
            });

            Session::flash('tab', 'tab_documento');
            Session::flash('message_sucesso', 'Documento Alterado!');
            return Redirect::to('processo/'.$modelo->processo->numero.'/edit');
        } catch (\Exception  $errors) {
            Session::flash('message_erro','Não foi possível alterar documento, tente novamente mais tarde.!');
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
            //Teste se foi ou tentou assinar
            $teste_assinatura = DocumentoTramite::where('fk_processo_documento',$id)->get();
            if($teste_assinatura->count()==0){
                $modelo->status = 'Inativo';
                $modelo->save();

                $log =  new ProcessoLog();
                $log->fk_user = Auth::user()->id;
                $log->fk_processo = $modelo->fk_processo;
                $log->status = 'Documento "'.$modelo->titulo.'" excluído por: <b>'.Auth::user()->nome.'</b>';
                $log->save();

                return response()->json(array('status' => "OK"));
            } else{
                // return Redirect::to('documento/'.$modelo->id.'/arquivar');
                return response()->json(array('status' => "ERRO", 'id' => $modelo->id));
            }
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => $erro));
        }
    }

    public function assinatura_documento($id)
    {
        try {
            $documento_tramite = DocumentoTramite::find($id);
            $documento_tramite->status = "Finalizado";

            $documento_assinatura =  new DocumentoAssinatura();
            $documento_assinatura->ip = "";
            $documento_assinatura->dispositivo = "";
            $documento_assinatura->fk_processo_documento = $documento_tramite->fk_processo_documento;
            $documento_assinatura->fk_user = Auth::user()->id;



            DB::transaction(function () use ($documento_assinatura,$documento_tramite) {
                $documento_assinatura->save();
                $documento_tramite->save();

                $log =  new ProcessoLog();
                $log->fk_user = Auth::user()->id;
                $log->fk_processo = $documento_tramite->processo_documento->fk_processo;
                $log->status = 'Documento "'.$documento_tramite->processo_documento->titulo.'" assinado por: <b>'.Auth::user()->nome.'</b>';
                $log->save();
            });

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('errors' => $erro));
        }
    }

    public function marcar_lido($id)
    {
        try {
            $documento_tramite = DocumentoTramite::find($id);
            $documento_tramite->status = "Finalizado";

            DB::transaction(function () use ($documento_tramite) {
                $documento_tramite->save();

                $log =  new ProcessoLog();
                $log->fk_user = Auth::user()->id;
                $log->fk_processo = $documento_tramite->processo_documento->fk_processo;
                $log->status = 'Documento "'.$documento_tramite->processo_documento->titulo.'" visto por: <b>'.Auth::user()->nome.'</b>';
                $log->save();
            });

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('errors' => $erro));
        }
    }

    public function assinatura_documento_autor($id)
    {
        try {
            $documento_tramite = new DocumentoTramite();
            $documento_tramite->assinatura = true;
            $documento_tramite->leitura = false;
            $documento_tramite->fk_processo_documento = $id;
            $documento_tramite->fk_setor = null;
            $documento_tramite->fk_user = Auth::user()->id;
            $documento_tramite->status = "Finalizado";

            $documento_assinatura =  new DocumentoAssinatura();
            $documento_assinatura->ip = "";
            $documento_assinatura->dispositivo = "";
            $documento_assinatura->fk_processo_documento = $id;
            $documento_assinatura->fk_user = Auth::user()->id;


            DB::transaction(function () use ($documento_assinatura,$documento_tramite) {
                $documento_assinatura->save();
                $documento_tramite->save();
            });

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('errors' => $erro));
        }
    }

    public function arquivamentoTela($id)
    {
        try {
            $documento = ProcessoDocumento::find($id);

            $modelo = Processo::where('id', $documento->fk_processo)->first();

            return view('justificativa.arquivar',compact('id','documento','modelo'));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }

    public function arquivamento($id, Request $request)
    {
        try {
            $modelo = ProcessoDocumento::find($id);

            $modelo->status = 'Arquivado';
            $modelo->save();

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $modelo->fk_processo;
            $log->justificativa = $request->justificativa;

            $log->status = 'Documento "'.$modelo->titulo.'" Arquivado por: <b>'.Auth::user()->nome.'</b>';
            $log->save();

            Session::flash('message_sucesso', 'Documento Arquivado!');
            Session::flash('tab', 'tab_documento');
            return Redirect::to('processo/'.$modelo->processo->numero.'/edit');
        } catch (\Exception  $erro) {
            Session::flash('message_erro','Não foi possível arquivar o documento, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }
}
