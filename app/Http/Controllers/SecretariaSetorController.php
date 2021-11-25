<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setor;

class SecretariaSetorController extends Controller
{
    public function select_setores($id)
    {
        // dd($id);
        $setor = Setor::select("titulo", "id")->where("fk_secretaria", $id)->orderBy('titulo')->get();
        // dd($setor);
        return response()->json(['setores'=>$setor]);
    }
}
