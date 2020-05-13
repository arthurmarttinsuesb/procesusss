<?php

namespace App\Http\Controllers;

use App\Secretaria;
use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secretaria = Secretaria::where('status', 'ativo')->get();
        return $secretaria;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        try{
            $secretaria = new Secretaria();

            $secretaria->titulo = $request->titulo;
            $secretaria->sigla = $request->sigla;
            $secretaria->status = $request->status;

            $secretaria->save();

            return response()->json(array('status' => "OK"));
        } catch(\Exception  $erro){
            return response()->json(array('erro' => "ERRO"));
        }

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $secretaria = Secretaria::find($id)->where('status', 'ativo')->get();

        return $secretaria;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try{
            $secretaria = Secretaria::find($id);

            $secretaria->titulo = isset($request->titulo) ? $request->titulo : $secretaria->titulo;
            $secretaria->sigla = isset($request->sigla) ? $request->sigla : $secretaria->sigla;
            $secretaria->status = isset($request->status) ? $request->status : $secretaria->status;

            $secretaria->save();

            return response()->json(array('status' => "OK"));
        } catch(\Exception  $erro){
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

        $secretaria = Secretaria::find($id);
        $secretaria->status = 'inativo';
        $secretaria->save();

        return response()->json(array('status' => "OK"));
    }
}
