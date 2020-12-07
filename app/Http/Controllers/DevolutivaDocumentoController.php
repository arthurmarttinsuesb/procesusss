<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestDevolutivaDocumento;
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


class DevolutivaDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       // $modelo = ProcessoDocumento::where('id', $id)->where('status', 'Ativo')->first();
       // return view ('devolutiva.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      //  $modelo = ProcessoDocumento::where('id', $id)->where('status', 'Ativo')->first();
      //  return view ('devolutiva.create', compact('modelo'));
        /*$modelo = ProcessoDocumento::where('id', $id)->where('status', 'Ativo')->first();
        $usuario = User::where('status','Ativo')-> role(['funcionario','administrador'])->get();
        $secretaria = Secretaria::where('status','Ativo')->get();
       
        return view('processo.documento.tramite', compact('modelo','usuario','secretaria'));*/

       // return view('documento_devolutiva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestDevolutivaDocumento $request, $id)
    {
       
        try {

            $log =  new ProcessoLog();
            $log->fk_user = Auth::user()->id;

            $log->fk_processo = $slug->fk_processo;
            $log->status = 'Documento "'.$slug->titulo.'" encaminhado por: <b>'.Auth::user()->nome.'</b>';
           
            $modelo = DocumentoTramite::where('fk_processo_documento', $id)->first();
    
            $devolutiva = new DevolutivaDocumento ();
            $devolutiva->observacao = $request->observacao;
            $devolutiva->fk_tramite_documento =  $modelo->id;
            $devolutiva->fk_user = $modelo->fk_user ;
            $devolutiva->fk_setor = $modelo->fk_setor;

            DB::transaction(function () use ($modelo,$request,$log) {
                $modelo = DocumentoTramite::find($id);
                $modelo->status = "Devolvido";
      
                
                if( $modelo->fk_user == null){
                 
                    $setor = Setor::where('id', $modelo->fk_setor)->first();
                   
                    try{
                        Mail::to($setor->email)->send(new DocumentoRecebidoSetor($setor));
                    }catch(\Exception $erro){
                        return response()->json(array($erro.'erro' => "ERRO_EMAIL"));
                    }
                }else {
                    
                   
           
                    $user = User::where('id', $modelo->fk_user)->first();
                   
                    try{
                        Mail::to($user->email)->send(new DocumentoRecebidoUser($user));
                    }catch(\Exception $erro){
                        return response()->json(array($erro.'erro' => "ERRO_EMAIL"));
                    }
                }
                $modelo->save();
                $log->save();
                $devolutiva->save();
            });

            Session::flash('message_success', 'Documento devolvido!');
            return back()->withInput();
        } catch (\Exception  $errors) {
            Session::flash('message', $errors.'Não foi possível devolver documento, tente novamente mais tarde.!');
            return back()->withInput();
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function devolutiva_documento()
    {
    
     return view('devolutiva.documento_devolutiva');
 
    }*/
    public function show($id){

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
    public function devolutiva( $id)
    {
        //

        $modelo = DocumentoTramite::find($id);
      //  $modelo->status = 'Inativo';
     // $modelo->save();
         return view ('devolutiva.create',compact('modelo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    
    
}
