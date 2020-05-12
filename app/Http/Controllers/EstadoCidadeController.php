<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use Response;

class EstadoCidadeController extends Controller
{

     //Select Cidade
     public function select_cidade(Request $request){
        //consulta no banco
        $dados_cidades = Cidade::where('fk_estado',$request->id)->select('id','nome')->orderBy('nome')->get();
        //Array de cidade
        $cidades = array();
        foreach($dados_cidades as $dados_cidade){
            array_push($cidades,[
                'id' => $dados_cidade->id,
                'nome' => $dados_cidade->nome
            ]);
        }
        //retornando para o javascript
        return response()->json(['cidades' => $cidades]);
    }

}
