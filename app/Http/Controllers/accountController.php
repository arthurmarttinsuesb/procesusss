<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\View;
use Session;
use Redirect;
use DB;

class accountController extends Controller
{
    public function index(){
        $usuario = Auth::user();
        return View::make('minhaConta.index',['usuario'=>$usuario]); 
    }
    public function editEmail()
    {
        $usuario = Auth::user();
        
        return view('minhaConta.editEmail', ['usuario'=>$usuario]);
    }
    public function editSenha()
    {
        $usuario = Auth::user();
        
        return view('minhaConta.editSenha', ['usuario'=>$usuario]);
    }
    public function update(Request $request, $id)
    {
            try {
                $usuario = Auth::user();
                
                if(isset($request->password)){ // trocar senha
                    if (password_verify($request->password_current, $usuario->password)) {
                        $usuario->password = bcrypt($request->password);
                        DB::transaction(function () use ($usuario, $request) {
                            $usuario->save();
                        });
                        Session::flash('message', 'Senha alterada com sucesso!');
                        return Redirect::to('conta');
                    } else
                    Session::flash('message', 'Senha atual incorreta, tente novamente mais tarde.!');
                    return back()->withInput();
                    }
                
                    else{ // requisição no trocar email
                        $usuario->email = isset($request->email) ? $request->email : $usuario->email;
                        $usuario->save();
                        Session::flash('message', 'Email alterado com sucesso!');
                        return Redirect::to('conta');
                    }
                   
                

               
            } catch (\Exception  $erro) {
                Session::flash('message', 'Não foi possível alterar, tente novamente mais tarde.!');
                return back()->withInput();
            }
    
            
    }
}
