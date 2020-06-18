<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\DocumentoTramite;
use App\ProcessoDocumento;

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
        $consulta =  DocumentoTramite::where('fk_user', Auth::user()->id)->where('status', '=', 'Ativo')->get();
        $processo = ProcessoDocumento::where('fk_user', Auth::user()->id)->where('status', '=', 'Ativo')->get();
        return view('home', ['docs' => $consulta, 'process' => $processo]);
    }
}