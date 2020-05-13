<?php

namespace App\Http\Controllers;

use App\Setor;
use Illuminate\Http\Request;




class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Setor::all();
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
            $setor = new Setor();

            $setor->titulo = $request->titulo;
            $setor->sigla = $request->sigla;
            $setor->status = $request->status;
            $setor->fk_secretaria = $request->fk_secretaria;

            $setor->save();


            return response()->json(array('status' => "OK"));
        } catch(\Exception  $erro){
            return response()->json(array('erro' => "ERRO"));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function show(Setor $setor, $id)
    {
        $setor = Setor::find($id);

        return $setor;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setor $setor, $id)
    {

        try{
            $setor = Setor::find($id);

            $setor->titulo = isset($request->titulo) ? $request->titulo : $setor->titulo;
            $setor->sigla = isset($request->sigla) ? $request->sigla : $setor->sigla;
            $setor->status = isset($request->status) ? $request->status : $setor->status;
            $setor->fk_secretaria = isset($request->fk_secretaria) ? $request->fk_secretaria : $setor->fk_secretaria;
            $setor->arquivo = isset($request->arquivo) ? $nameFile : $setor->arquivo;

            $setor->save();

            return response()->json(array('status' => "OK"));
        } catch(\Exception  $erro){
            return response()->json(array('erro' => "ERRO"));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setor $setor, $id)
    {

        $setor = Setor::find($id);
        $setor->delete();
        return response()->json(array('status' => "OK"));
    }


}
