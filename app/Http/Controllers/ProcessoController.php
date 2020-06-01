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
use App\Http\Utility\BotoesDatatable;

class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('processo.index');
    }

    public function list(Request $request)
    {
        if (Auth::user()->hasRole('administrador')) {
            $modelo = Processo::where('status', "Ativo")->get();
        } else {
            $modelo = Processo::where('fk_user', Auth::user()->id)->where('status', "Ativo")->get();
        }
        return Datatables::of($modelo)
            ->editColumn('acao', function ($modelo) {
                return BotoesDatatable::criarBotoes($modelo->id, 'processo');
            })->escapeColumns([0])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
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
            $id = Auth::id();

            $processo = new Processo();
            $processo->numero = 'pmj.' . time() . '.' . date('Y');
            $processo->tipo = $request->tipo;
            $processo->fk_user = $id;
            $processo->status = 'Ativo';

            $processo->save();

            return Redirect::to('processo/' . $processo->id . '/edit');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível cadastrar, tente novamente mais tarde.!' . $erro);
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
        $processo = Processo::find($id);

        return view('processo.edit', ['processo' => $processo]);
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
