<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\DocumentoTramite;
use App\ProcessoDocumento;
use App\ProcessoTramitacao;
use App\UserSetor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $setor  = UserSetor::where('fk_user', Auth::user()->id)->where('status', 'Ativo')->first();

        $processo  = ProcessoTramitacao::where('fk_user', Auth::user()->id)->orWhere('fk_setor', $setor->fk_setor)->get();
        $documento  = DocumentoTramite::where('fk_user', Auth::user()->id)->orWhere('fk_setor', $setor->fk_setor)->where('status','Pendente')->orderBy('created_at','desc')->get();

        return view('home', compact('documento','processo'));

    }

}