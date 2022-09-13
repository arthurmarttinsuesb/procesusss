<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestUserSetors;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Http\Utility\BotoesDatatable;

use App\UserSetor;
use App\User;
use App\Secretaria;
use App\Setor;

use Auth;
use DB;
use Session;
use Redirect;
use DataTables;





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
        ->editColumn('email', function ($usuarioSetor) {
            return  $usuarioSetor->user->email;
        })
        ->editColumn('nome', function ($usuarioSetor) {
                return  $usuarioSetor->user->nome;
        })
        ->editColumn('tipo', function ($usuarioSetor) {
            $tipo = $usuarioSetor->user->getRoleNames();
            if ($tipo[0] == "administrador"){
                return "Administrador";
            }elseif($tipo[0] == "colaborador-nivel-1"){
                return "Colaborador Nível 1";
            }elseif($tipo[0] == "colaborador-nivel-2"){
                return "Colaborador Nível 2";
            }
        })
        ->editColumn('unidade_setor', function ($usuarioSetor) {
            return  $usuarioSetor->setor->secretaria->sigla." - ".$usuarioSetor->setor->titulo;
        })
        ->editColumn('secretaria', function ($usuarioSetor) {
            
        })
        ->editColumn('acao', function ($usuarioSetor) {
            return BotoesDatatable::criarBotoesPrincipais($usuarioSetor->user->slug, 'usuario-setor');
        })->escapeColumns([0])
        ->make(true);
    }

    public function create()
    {
        $users = User::where('status', 'Ativo')->get();
        $secretarias = Secretaria::where('status', 'Ativo')->get();
        $setores = Setor::where('status', 'Ativo')->get();
        return View::make('usuarioSetor.create', ['users' => $users, 'setores' => $setores,'secretarias' =>$secretarias]);
    }

    public function busca(Request $request)
    {
        try {
            dd($request->busca);
            $users = User::where('email', $request->busca)->select('id','nome')->where('status','Ativo')->first();
            return "<option value='$users->id'>$users->nome</option>";

        } catch (\Exception  $erro) {
            return response($erro, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestUserSetors $request)
    {
        try {

            $checkUsuario = UserSetor::where('fk_user', $request->fk_user)->where('status', 'Ativo')->get();
            if (!$checkUsuario->isEmpty()) {
                Session::flash('message', 'Usuario já vinculado em um setor!');
                return back()->withInput();
            }

            $userSetor = new UserSetor();

            $userSetor->fk_user = $request->fk_user;
            $userSetor->fk_setor = $request->fk_setor;
            $userSetor->data_entrada = date('Y-m-d', strtotime(str_replace("/", "-", $request->data_entrada)));
            $userSetor->status = 'Ativo';
            $userSetor->save();

            $user = User::where('id',$request->fk_user)->first();
            $user->removeRole($user->getRoleNames()->implode(', '));
            $user->assignRole($request->tipo);


            Session::flash('message', 'Usuário vinculado com sucesso!');
            return Redirect::to('usuario-setor');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível vincular, tente novamente mais tarde.!'.$erro);
            return back()->withInput();
        }
    }



    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit($slug)
    {
        try {
            $users = User::where("slug",$slug)->first();
            $userSetor = UserSetor::where("fk_user", $users->id)->where("status","Ativo")->first();
            return View::make('usuarioSetor.edit', ['usuarioSetor' => $userSetor, 'users' => $users]);
        } catch (Exception  $erro) {
            Session::flash('message', 'Não foi possível encontrar o registro!');
            return back();
        }
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
            $userSetor = UserSetor::find($id);
            $userSetor->data_entrada = $request->data_entrada;
            $userSetor->save();

            $user = User::where('id',$userSetor->fk_user)->first();
            $user->removeRole($user->getRoleNames()->implode(', '));
            $user->assignRole($request->tipo);

            Session::flash('message', 'Usuário atualizado!');
            return Redirect::to('usuario-setor');
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
            $userSetor = UserSetor::find($id);
            $user = User::find($userSetor->fk_user);
            $userSetor->status = 'Inativo';
            $userSetor->data_saida = date('Y-m-d H:i:s');
            $userSetor->save();

            $user->removeRole($user->getRoleNames()->implode(', '));
            $user->assignRole(2);

            return response()->json(array('status' => "OK"));
        } catch (\Exception $error) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}
