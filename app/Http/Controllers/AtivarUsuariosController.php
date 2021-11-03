<?php

namespace App\Http\Controllers;
use Mail;
use DataTables;

use App\User;
use App\UserSetor;
use App\Mail\UsuarioAtivado;
use App\Http\Utility\BotoesDatatable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
    public function edit($id)
    {
        $modelo = User::where('id', $id)->first();
        return view('ativarUsuarios.edit', compact('modelo'));
    }

    public function visualizar_dados($slug)
    {
        $modelo = User::where('slug', $slug)->first();
        return view('ativarUsuarios.visualizar_dados', compact('modelo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::where('status', 'Inativo')->where('id','!=','1')->get();
        return DataTables::of($usuario)
        ->editColumn('acao', function ($usuario) {
                return BotoesDatatable::criarBotoesAtivar($usuario->id, 'ativar-usuarios',$usuario->slug);
        })->escapeColumns([0])->make(true);
    }


           // ->editColumn('file', function ($usuario) {
        //     $docsHtml = '';

        //     $docs = json_decode($usuario->file->filenames, true);

        //         foreach($docs as $doc){
        //             $docsHtml = $docsHtml. "<a href='/files/".$doc."' target='_blank'>".$doc."</a> <br>";
        //         }

        //     return $docsHtml;

        // })

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        try {
            $modelo = User::find($id);
            $modelo->fk_modelo_documento = $request->tipo;
            $modelo->titulo = $request->titulo;
            $modelo->descricao = $request->descricao;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo) {
                $modelo->save();
            });

            Session::flash('message', 'Usuário Alterado!');
            return Redirect::to('processo/'.$modelo->fk_processo.'/edit');
        } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível alterar usuário, tente novamente mais tarde.!');
            return back()->withInput();
        }
    }

    public function ativar_usuario($slug)
    {

        try {
            $modelo = User::find($id);
            $modelo->fk_modelo_documento = $request->tipo;
            $modelo->titulo = $request->titulo;
            $modelo->descricao = $request->descricao;
            $modelo->conteudo = $request->conteudo;

            DB::transaction(function () use ($modelo) {
                $modelo->save();
            });

            Session::flash('message', 'Usuário Alterado!');
            return Redirect::to('processo/'.$modelo->fk_processo.'/edit');
        } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível alterar usuário, tente novamente mais tarde.!');
            return back()->withInput();
        }

        try {
            $user = User::find($id);
            $user->status = 'Ativo';
            $user->save();

            try{
                Mail::to($user->email)->send(new UsuarioAtivado($user));
            }catch(\Exception $erro){
                return response()->json(array('erro'.$erro => "ERRO_EMAIL"));
            }

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
            $checkUsuario = UserSetor::where('fk_user', $id)->where('status', 'Ativo')->get();
            if (!$checkUsuario->isEmpty()) {
                return response()->json(array('status' => "ERRO"));
            }

            $user = User::find($id);
            $user->status = 'Inativo';
            $user->save();


            return response()->json(array('status' => "OK"));
        } catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
    }
}
