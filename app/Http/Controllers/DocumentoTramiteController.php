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

use Session;
use Redirect;
#class

use App\Processo;
use App\ProcessoDocumento;
use App\DocumentoTramite;
use App\User;
use App\Setor;
use App\Secretaria;


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
        $modelo = ProcessoDocumento::where('id', $id)->where('fk_user', Auth::user()->id)->where('status', 'Ativo')->first();
        $usuario = User::where('status','Ativo')->role('funcionario')->get();;
        $secretaria = Secretaria::where('status','Ativo')->get();
        if(empty($modelo)){
            abort(401);
        }else{
            return view('documento.tramite', compact('modelo','usuario','secretaria'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestDocumentoTramite $request,$id)
    {
        try {
            DB::transaction(function () use ($id,$request) {
                if($request->envio=='setor'){
                    foreach($request->setor as $setores){
                        DocumentoTramite::create(array("assinatura"=>$request->assinatura,
                        "leitura"=>'false',
                        "fk_processo_documento"=>$id,
                        "fk_setor"=>$setores,
                        "fk_user"=>null,
                        "status"=>"Pendente"));
                    }
                }else if($request->envio=='usuario'){
                    foreach($request->usuario as $colaboradores){
                        DocumentoTramite::create(array("assinatura"=>$request->assinatura,
                        "leitura"=>'false',
                        "fk_processo_documento"=>$id,
                        "fk_setor"=>null,
                        "fk_user"=>$colaboradores,
                        "status"=>"Pendente"));
                    }
                }
                
            });

            Session::flash('message', 'Documento encaminhado!');
            return Redirect::to('processo/'.$request->processo.'/edit');
        } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível encaminhar documento, tente novamente mais tarde.!');
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
        //
    }
}
