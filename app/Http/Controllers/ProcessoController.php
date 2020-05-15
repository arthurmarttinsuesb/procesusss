<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Response;
use DataTables;
use DB;
use Auth;
use Validator;

use Session;
use Redirect;
#class

use App\Processo;

class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('Processo.listar_processo');
    }

    public function list(Request $request){
        if(Auth::user()->hasRole('administrador')){
            $modelo = Processo::where('status', "Ativo")->get();
        }else{
            $modelo = Processo::where('fk_user',Auth::user()->id)->where('status', "Ativo")->get();
        }

        return Datatables::of($modelo)
        ->editColumn('acao', function ($modelo) {
            return $this->setEstrutura($modelo);
        })->escapeColumns([0])
        ->make(true);
    } 

    private function setEstrutura(Processo $modelo){

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Processo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
