<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class accountController extends Controller
{
    public function index(){
        $usuario = Auth::user();
        return view('minhaConta.index',['usuario'=>$usuario]); 
    }
}
