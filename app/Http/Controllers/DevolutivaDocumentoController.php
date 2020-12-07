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
use App\DevolutivaDocumento;
use App\UserSetor;
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
    public function store(Request $request)
    {
        try {
            $userSetor = UserSetor::where('id', Auth::user()->id)->first();
            $devolutiva = new DevolutivaDocumento();
            $devolutiva->observacao = $request->Observação;
            $devolutiva->fk_tramite_documento = $request->documento;
            $devolutiva->fk_user = Auth::user()->id;
            $devolutiva->fk_setor = $userSetor->id;

            $documento_tramite = DocumentoTramite::find($request->documento);
            $documento_tramite->status = "Devolvido";

            DB::transaction(function () use ($devolutiva,$documento_tramite) {
                $devolutiva->save();
                $documento_tramite->save();
            });

            return Redirect::to('/home');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível cadastrar, tente novamente mais tarde.!');
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
        return view ('devolutiva.create', compact('id'));
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
