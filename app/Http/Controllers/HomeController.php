<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\DocumentoTramite;
use App\ProcessoDocumento;
use App\ProcessoTramitacao;

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
        //$consulta =  DocumentoTramite::where('fk_user', Auth::user()->id)->where('status', '=', 'Ativo')->get();
        //$processo = ProcessoDocumento::where('fk_user', Auth::user()->id)->where('status', '=', 'Ativo')->get();
        $processo = DB::table('processo_tramitacaos')
            ->join('processos', 'processo_tramitacaos.fk_processo', '=', 'processos.id')->where('processo_tramitacaos.fk_user', Auth::user()->id)->where('processo_tramitacaos.status', '=', 'em andamento')->where('processos.status', '=', 'Ativo')->get();


        $consulta  = DB::table('documento_tramites')
            ->join('processo_documentos', 'documento_tramites.fk_processo_documento', '=', 'processo_documentos.id')->where('documento_tramites.fk_user', Auth::user()->id)->where('documento_tramites.status', '=', 'Ativo')->get();
        return view('home', ['docs' => $consulta, 'process' => $processo]);
    }
}