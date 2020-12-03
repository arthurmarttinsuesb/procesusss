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
    public function index()
    {
        return view ('devolutiva.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
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
    public function store(RequestDevolutivaDocumento $request,ProcessoDocumento $slug)
    {
       
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
