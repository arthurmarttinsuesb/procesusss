<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use DataTables;

use App\Secretaria;
use App\Http\Utility\BotoesDatatable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;


class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('secretaria.index');
    }


    public function list()
    {
        $secretaria = Secretaria::where('status', 'Ativo')->get();

        return DataTables::of($secretaria)
            ->editColumn('acao', function ($secretaria) {
                return BotoesDatatable::criarBotoesPrincipais($secretaria->id, 'secretaria');
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
            ]);

            if ($validator->fails()) {
                return redirect('secretaria/create')
                    ->withErrors($validator, 'secretaria')
                    ->withInput();
            }

            $secretaria = new Secretaria();
            $secretaria->titulo = $request->titulo;
            $secretaria->sigla = $request->sigla;
            $secretaria->status = 'Ativo';

            $secretaria->save();

            Session::flash('message', 'Secretaria criada!');
            return Redirect::to('secretaria');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível cadastrar, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }

    public function create()
    {
        return View::make('secretaria.create');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $secretaria = Secretaria::find($id);

            return View::make('secretaria.show', ['secretaria' => $secretaria]);
        } catch (Exception  $erro) {
            Session::flash('message', 'Não foi possível encontrar o registro!');
            return back();
        }
    }


    public function edit($id)
    {
        $secretaria = Secretaria::find($id);

        return View::make('secretaria.edit', ['secretaria' => $secretaria]);
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
            ]);

            if ($validator->fails()) {
                return redirect('secretaria/' . $id . '/edit')
                    ->withErrors($validator, 'secretaria')
                    ->withInput();
            }

            $secretaria = Secretaria::find($id);

            $secretaria->titulo = isset($request->titulo) ? $request->titulo : $secretaria->titulo;
            $secretaria->sigla = isset($request->sigla) ? $request->sigla : $secretaria->sigla;

            $secretaria->save();


            Session::flash('message', 'Secretaria atualizada!');
            return Redirect::to('secretaria');
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
            $secretaria = Secretaria::find($id);
            $secretaria->status = 'Inativo';
            $secretaria->save();

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}
