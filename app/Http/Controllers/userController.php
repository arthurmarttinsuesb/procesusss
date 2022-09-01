<?php

namespace App\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Utility\BotoesDatatable;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;


class userController extends Controller
{
    //
    public function index(){
        return View::make('usuariosSistema.index');
    }
    public function listUser(){
        $usuarios = User::select();
        return DataTables::of($usuarios)
        ->editColumn('tipo', function ($usuarios) {
            $tipo = $usuarios->getRoleNames();
            if ($tipo[0] == "administrador"){
                return "Administrador";
            }elseif($tipo[0] == "colaborador-nivel-1"){
                return "Colaborador Nível 1";
            }elseif($tipo[0] == "colaborador-nivel-2"){
                return "Colaborador Nível 2";
            }else if($tipo[0] == "cidadao"){
                return "Cidadao";
            }

        })
        ->editColumn('status', function ($usuarios) {
            if($usuarios->status=='Ativo'){
                return  '<span class="right badge badge-success">Ativo</span>';
            } else  if($usuarios->status=='Inativo'){
                return  '<span class="right badge badge-danger">Inativo</span>';
            }
        })->editColumn('acao', function ($usuarios) {
            return BotoesDatatable::criarBotoesPrincipais($usuarios->id, 'usuarios');
        })->escapeColumns([0])->make(true);
    }
    public function edit($id)
    {
        $usuarios = User::find($id);

        return View::make('usuariosSistema.edit', ['usuarios' => $usuarios]);
    }
    public function update(Request $request, $id)
    {

        try {
            $validator = Validator::make($request->all(), [
                'nome' => 'required',
                'tipo' => 'required',
                'email' => 'required',
                'telefone' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('usuarios/' . $id . '/edit')
                    ->withErrors($validator, 'usuarios')
                    ->withInput();
            }

            $usuarios = User::find($id);

            $usuarios->nome = isset($request->nome) ? $request->nome : $usuarios->nome;
            $usuarios->email = isset($request->email) ? $request->email : $usuarios->email;
            $usuarios->telefone = isset($request->telefone) ? $request->telefone : $usuarios->telefone;
            $usuarios->removeRole($usuarios->getRoleNames()->implode(', '));
            $usuarios->assignRole($request->tipo);
            $usuarios->save();


            Session::flash('message', 'Usuario atualizado!');
            return Redirect::to('usuarios');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível alterar, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }
    public function destroy($id)
    {
        try {
            $usuarios = User::find($id);
            $usuarios->status = 'Inativo';
            $usuarios->save();
            return response()->json(array('status' => "OK"));

           
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}
