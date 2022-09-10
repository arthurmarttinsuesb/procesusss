<?php

namespace App\Http\Controllers;
use Session;
use Redirect;
use DataTables;

use App\User;

use Illuminate\Http\Request;
use App\Http\Utility\BotoesDatatable;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Estado;
use App\Cidade;


class userController extends Controller
{
    //
    public function index(){
        return View::make('usuariosSistema.index');
    }
    public function listUser(){
        $usuarios = User::get();
        return DataTables::of($usuarios)
        ->editColumn('nome', function ($usuarios) {
            return  $usuarios->nome;
        })
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
        ->editColumn('telefone', function ($usuarios) {
            return  $usuarios->telefone;
        })
        ->editColumn('email', function ($usuarios) {
            return  $usuarios->email;
        })
        ->editColumn('sexo', function ($usuarios) {
            return  $usuarios->sexo;
        })
       ->editColumn('nascimento', function($usuarios){
            return date('d/m/Y', strtotime($usuarios->nascimento));
        }) 
        ->editColumn('status', function ($usuarios) {
            if($usuarios->status=='Ativo'){
                return  '<span class="right badge badge-success">Ativo</span>';
            } else  if($usuarios->status=='Inativo'){
                return  '<span class="right badge badge-danger">Inativo</span>';
            }
        })
        ->editColumn('acao', function ($usuarios) {
            return BotoesDatatable::criarBotoesPrincipais($usuarios->id, 'usuarios');
        })
        ->escapeColumns([0])->make(true);

    }
    public function edit($id)
    {
        $usuarios = User::find($id);
        $estados =  Estado::select('id', 'nome', 'sigla')->get();
        $cidades = Cidade::select('id', 'nome', 'fk_estado')->orderBy('nome')->get();

        return View::make('usuariosSistema.edit', ['usuarios' => $usuarios, 'cidades' => $cidades, 'estados' => $estados]);
    }
    public function update(Request $request, $id)
    {

        try {
            $validator = Validator::make($request->all(), [
                'nome' => 'required',
                'tipo' => 'required',
                'email' => 'required',
                'telefone' => 'required',
                'sexo' => 'required',
                'cpf_cnpj' =>'required',
                'nascimento' => 'required',
                'logradouro' => 'required',
                'bairro' => 'required',
                'cep' => 'required',
                'numero' => 'required',
                
                
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
            $usuarios->sexo = isset($request->sexo) ? $request->sexo : $usuarios->sexo;
            $usuarios->nascimento = isset($request->nascimento) ? $request->nascimento : $usuarios->nascimento;
            $usuarios->logradouro = isset($request->logradouro) ? $request->logradouro : $usuarios->logradouro;
            $usuarios->bairro = isset($request->bairro) ? $request->bairro : $usuarios->bairro;
            $usuarios->cep = isset($request->cep) ? $request->cep : $usuarios->cep;
            $usuarios->cpf_cnpj = isset($request->cpf_cnpj) ? $request->cpf_cnpj : $usuarios->cpf_cnpj;
            $usuarios->numero = isset($request->numero) ? $request->numero : $usuarios->numero;
            $usuarios->complemento = isset($request->complemento) ? $request->complemento : $usuarios->complemento;
            $usuarios->fk_cidade = $request->cidade;
            $usuarios->fk_estado = $request->estado;
            
            //$usuarios->cidade = isset($request->cidade) ? $request->cidade : $usuarios->cidade; // pedente de alteração
            //$usuarios->estado = isset($request->estado->id) ? $request->estado->id : $usuarios->estado;
            $usuarios->removeRole($usuarios->getRoleNames()->implode(', '));
            $usuarios->assignRole($request->tipo);
            $usuarios->save();


            Session::flash('message', 'Usuário atualizado!');
            return Redirect::to('usuarios');
        } catch (\Exception  $erro) {
            Session::flash('message', 'Não foi possível alterar, tente novamente mais tarde!');
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
