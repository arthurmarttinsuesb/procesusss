<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use DataTables;

use App\UserSetor;
use App\User;
use App\Secretaria;

use Auth;
use DB;
use App\Setor;
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
        ->editColumn('nome', function ($usuarioSetor) {
                return  $usuarioSetor->user->nome;
        })
        ->editColumn('tipo', function ($usuarioSetor) {
            return  $usuarioSetor->user->getRoleNames();
        })
        ->editColumn('setor', function ($usuarioSetor) {
                return  $usuarioSetor->setor->titulo;
        })
        ->editColumn('secretaria', function ($usuarioSetor) {
            return  $usuarioSetor->setor->secretaria->titulo;
        })
            ->editColumn('acao', function ($usuarioSetor) {
                return BotoesDatatable::criarBotoesPrincipais($usuarioSetor->id, 'usuario-setor');
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
                'tipo' => 'required',
                'data_entrada' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('usuario-setor/create')
                    ->withErrors($validator, 'usuario-setor')
                    ->withInput();
            }

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


            Session::flash('message', 'Usuario vinculado com sucesso!');
            return Redirect::to('usuario-setor');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível vincular, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }



    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        try {
            $userSetor = UserSetor::find($id);
            $users = User::where('status', 'Ativo')->get();
            $setores = Setor::where('status', 'Ativo')->get();
            $secretarias = Secretaria::where('status', 'Ativo')->get();
            return View::make('usuarioSetor.edit', ['usuarioSetor' => $userSetor, 'users' => $users, 'setores' => $setores, 'secretarias' =>$secretarias]);
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

            $validator = Validator::make($request->all(), [
                'fk_user' => 'required',
                'fk_setor' => 'required',
                'data_entrada' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('usuario-setor/' . $id . '/edit')
                    ->withErrors($validator, 'usuario-setor')
                    ->withInput();
            }

            $userSetor->fk_user = isset($request->fk_user) ? $request->fk_user : $userSetor->fk_user;
            $userSetor->fk_setor = isset($request->fk_setor) ? $request->fk_setor : $userSetor->fk_setor;
            $userSetor->data_entrada = isset($request->data_entrada) ? $request->data_entrada : $userSetor->data_entrada;
            $userSetor->save();

            $user = User::where('id',$request->fk_user)->first();
            $user->removeRole($user->getRoleNames()->implode(', '));
            $user->assignRole($request->tipo);

            Session::flash('message', 'Usuario atualizado!');
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
