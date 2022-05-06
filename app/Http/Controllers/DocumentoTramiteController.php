<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestDocumentoTramite;
use Illuminate\Support\Facades\Input;
use Spatie\Permission\Models\Role;

use Response;
use DataTables;
use DB;
use Hash;
use Auth;
use Validator;
use Mail;
use Session;
use Redirect;
#class

use App\Processo;
use App\ProcessoDocumento;
use App\ProcessoLog;
use App\DocumentoTramite;
use App\User;
use App\Setor;
use App\Secretaria;
use App\Mail\DocumentoRecebidoUser;
use App\Mail\DocumentoRecebidoSetor;


class DocumentoTramiteController extends Controller
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
    public function create($id)
    {
        $modelo = ProcessoDocumento::where('id', $id)->where('status', 'Ativo')->first();
        $usuario = User::where('status','Ativo')-> role(['colaborador-nivel-2','administrador'])->get();
        $secretaria = Secretaria::where('status','Ativo')->get();

        return view('processo.documento.tramite', compact('modelo','usuario','secretaria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestDocumentoTramite $request,ProcessoDocumento $slug)
    {
        try {

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $slug->fk_processo;
            $log->status = 'Documento "'.$slug->titulo.'" encaminhado por: <b>'.Auth::user()->nome.'</b>';

            DB::transaction(function () use ($slug,$request,$log) {
                if($request->envio=='setor'){
                    foreach($request->setor as $setores){
                        DocumentoTramite::create(array("assinatura"=>$request->assinatura,
                        "leitura"=>'false',
                        "fk_processo_documento"=>$slug->id,
                        "fk_setor"=>$setores,
                        "fk_user"=>null,
                        "status"=>"Pendente"));
                    }

                   // $setor = Setor::find($request->setor);
                    $setor = Setor::where('id', $request->setor)->first();

                    try{
                        Mail::to($setor->email)->send(new DocumentoRecebidoSetor($setor));
                    }catch(\Exception $erro){
                        return response()->json(array($erro.'erro' => "ERRO_EMAIL"));
                    }
                }else if($request->envio=='colaborador'){
                    foreach($request->usuario as $colaboradores){
                        DocumentoTramite::create(array("assinatura"=>$request->assinatura,
                        "leitura"=>'false',
                        "fk_processo_documento"=>$slug->id,
                        "fk_setor"=>null,
                        "fk_user"=>$colaboradores,
                        "status"=>"Pendente"));
                    }

                  //  $user = User::find($request->usuario);
                    $user = User::where('id', $request->usuario)->first();
                   // dd($user->email);
                    try{
                        Mail::to($user->email)->send(new DocumentoRecebidoUser($user));
                    }catch(\Exception $erro){
                        return response()->json(array($erro.'erro' => "ERRO_EMAIL"));
                    }
                }
                $log->save();
            });

            Session::flash('message_success', 'Documento encaminhado!');
            return back()->withInput();
        } catch (\Exception  $errors) {
            Session::flash('message', $errors.'Não foi possível encaminhar documento, tente novamente mais tarde.!');
            return back()->withInput();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $modelo = DocumentoTramite::find($id);
            $modelo->status = 'Inativo';
            $modelo->save();

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;
            $log->fk_processo = $modelo->processo_documento->fk_processo;
            $log->status = 'Encaminhamento do Documento "'.$modelo->processo_documento->titulo.'" excluído por: <b>'.Auth::user()->nome.'</b>';
            $log->save();

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }

    public function list($id)
    {
        $modelo = DocumentoTramite::where('fk_processo_documento', $id)->where('status','<>','Inativo')->get();
        return Datatables::of($modelo)
            ->editColumn('assinatura', function ($modelo) {
                 if($modelo->assinatura==true){
                    return 'Sim';
                 }else{
                     return 'Não';
                 }
            })
            ->editColumn('envio', function ($modelo) {
                if($modelo->fk_setor==null){
                    return  $modelo->user->nome;
                }else{
                    return $modelo->setor->titulo;
                  }
            })
            ->editColumn('status', function ($modelo) {
                if($modelo->status=='Pendente' && $modelo->assinatura==true){
                    return  '<span class="right badge badge-info">Aguardando Assinatura</span>';
                } else if($modelo->status=='Pendente' && $modelo->leitura==false && $modelo->assinatura==false){
                    return  '<span class="right badge badge-info">Aguardando Usuário Visualizar</span>';
                }else  if($modelo->status=='Finalizado'){
                    return  '<span class="right badge badge-secondary">finalizado</span>';
                }
            })
            ->editColumn('acao', function ($modelo) {
                //se o processo documento desse tramite estiver bloqueado, então não poderar adicionar
                //outros envios do documento ou até mesmo excluir;

             if($modelo->processo_documento->tramite=="Liberado"){
                if($modelo->status!=='Finalizado'){
                    return '<div class="btn-group btn-group-sm">
                                        <a href="#"
                                        class="btn bg-danger color-palette btnExcluir"
                                        data-id="'.$modelo->id.'"
                                        title="Excluir" data-toggle="tooltip">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>';
                }
            }else {
                    return "";
                }

            })->escapeColumns([0])
            ->make(true);
    }

}
