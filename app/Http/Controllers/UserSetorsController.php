<?php

namespace App\Http\Controllers;

use Redirect;
use DataTables;

use App\UserSetor;
use App\Http\Utility\BotoesDatatable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class UserSetorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('usuarioSetor.index');
    }

    public function list()
    {
        $usuarioSetor = UserSetor::where('status', 'Ativo')->get();

        return DataTables::of($usuarioSetor)
            ->editColumn('acao', function ($usuarioSetor) {
                return BotoesDatatable::criarBotoes($usuarioSetor->id, 'secretaria');
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
                'fk_user' => 'required',
                'fk_setor' => 'required',
                'data_entrada' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('usuario-setor/create')
                    ->withErrors($validator, 'usuarioSetor')
                    ->withInput();
            }

            $checkUsuario = UserSetor::where('fk_user', $request->fk_user)->where('status', 'Ativo');
            if ($checkUsuario) {
                Session::flash('message', 'Usuario já vinculado em um setor!');
                return back()->withInput();
            }
            $checkSetor = UserSetor::where('fk_setor', $request->fk_setor)->where('status', 'Ativo');
            if ($checkSetor) {
                Session::flash('message', 'Setor já vinculado a um usuario!');
                return back()->withInput();
            }

            $userSetor = new UserSetor();

            $userSetor->fk_user = $request->fk_user;
            $userSetor->fk_setor = $request->fk_setor;
            $userSetor->data_entrada = $request->data_entrada;
            $userSetor->status = 'Ativo';

            $userSetor->save();

            Session::flash('message', 'Usuario vinculado com sucesso!');
            return Redirect::to('usuario-setor');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível vincular, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }


    public function create()
    {
        return View::make('usuario-setor.create');
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userSetor = UserSetor::find($id)->where('status', 'ativo')->get();

        return $userSetor;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setor $setor, $id)
    {

        try {
            $userSetor = UserSetor::find($id);

            $userSetor->fk_user = isset($request->fk_user) ? $request->fk_user : $userSetor->fk_user;
            $userSetor->fk_setor = isset($request->fk_setor) ? $request->fk_setor : $userSetor->fk_setor;
            $userSetor->data_entrada = isset($request->data_entrada) ? $request->data_entrada : $userSetor->data_entrada;
            $userSetor->data_saida = isset($request->data_saida) ? $request->data_saida : $userSetor->data_saida;
            $userSetor->status = isset($request->status) ? $request->status : $userSetor->status;

            $userSetor->save();

            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $setor = UserSetor::find($id);
        $setor->status = 'inativo';
        $setor->save();

        return response()->json(array('status' => "OK"));
    }
}
