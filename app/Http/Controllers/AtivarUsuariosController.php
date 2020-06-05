<?php

namespace App\Http\Controllers;
use Session;
use Redirect;
use DataTables;


use App\User;
use App\Http\Utility\BotoesDatatable;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class AtivarUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('ativarUsuarios.index');
    }

    public function list()
    {
        $usuario = User::where('status', 'Inativo')->with('cidade')->with('estado')->get();

        return DataTables::of($usuario)
            ->editColumn('acao', function ($usuario) {
                return BotoesDatatable::criarBotoesAtivar($usuario->id, 'ativar-usuarios');
            })->escapeColumns([0])
            ->make(true);
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
            $usuario = User::find($id);
            $usuario->status = 'Ativo';
            $usuario->save();

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
