<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use DataTables;


use App\Setor;
use App\Secretaria;
use App\Http\Utility\BotoesDatatable;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;



class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('setor.index');
    }

    public function list()
    {
        $setor = Setor::where('status', 'Ativo')->with('secretaria')->get();
        return DataTables::of($setor)
            ->editColumn('acao', function ($setor) {
                return BotoesDatatable::criarBotoes($setor->id, 'setor');
            })->escapeColumns([0])
            ->make(true);
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
            $validator = Validator::make($request->all(), [
                'titulo' => 'required',
                'sigla' => 'required',
                'fk_secretaria' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('setor/create')
                    ->withErrors($validator, 'setor')
                    ->withInput();
            }

            $setor = new Setor();
            $setor->titulo = $request->titulo;
            $setor->sigla = $request->sigla;
            $setor->status = 'Ativo';
            $setor->fk_secretaria = $request->fk_secretaria;

            $setor->save();

            Session::flash('message', 'Setor criado!');
            return Redirect::to('setor');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível cadastrar, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }

    public function create()
    {
        $secretarias = Secretaria::where('status', 'Ativo')->get();
        return View::make('setor.create', ['secretarias' => $secretarias]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $setor = Setor::find($id);
            $secretarias = Secretaria::where('status', 'Ativo')->get();

            return View::make('setor.show',  ['secretarias' => $secretarias, 'setor' => $setor]);
        } catch (Exception  $erro) {
            Session::flash('message', 'Não foi possível encontrar o registro!');
            return back();
        }
    }

    public function edit($id)
    {
        $setor = Setor::find($id);
        $secretarias = Secretaria::where('status', 'Ativo')->get();

        return View::make('setor.edit', ['secretarias' => $secretarias, 'setor' => $setor]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'titulo' => 'required',
                'sigla' => 'required',
                'fk_secretaria' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('setor/' . $id . '/edit')
                    ->withErrors($validator, 'setor')
                    ->withInput();
            }

            $setor = Setor::find($id);

            $setor->titulo = isset($request->titulo) ? $request->titulo : $setor->titulo;
            $setor->sigla = isset($request->sigla) ? $request->sigla : $setor->sigla;
            $setor->fk_secretaria = isset($request->fk_secretaria) ? $request->fk_secretaria : $setor->fk_secretaria;

            $setor->save();

            Session::flash('message', 'Setor atualizado!');
            return Redirect::to('setor');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível alterar, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $setor = Setor::find($id);
            $setor->status = 'Inativo';
            $setor->save();

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}
