<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use DataTables;

use App\ProcessoDocumento;
use App\Processo;
use App\ProcessoAnexo;
use App\Http\Utility\BotoesDatatable;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class ConsultarProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('consultarProcesso.index');
    }

    public function list($numero)
    {
        $processo = Processo::where('numero', $numero)->get();
        return DataTables::of($processo)->editColumn('acao', function ($processo) {
            return BotoesDatatable::criarBotoes($processo->id, 'processo');
        })->escapeColumns([0])->make(true);
    }
}