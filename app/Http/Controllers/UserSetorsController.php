<?php

namespace App\Http\Controllers;

use App\UserSetor;
use Illuminate\Http\Request;

class UserSetorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userSetor = UserSetor::where('status', 'ativo')->get();
        return $userSetor;
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
            $userSetor = new UserSetor();

            $userSetor->fk_user = $request->fk_user;
            $userSetor->fk_setor = $request->fk_setor;
            $userSetor->data_entrada = $request->data_entrada;
            $userSetor->data_saida = $request->data_saida;
            $userSetor->status = $request->status;

            $userSetor->save();


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
        $userSetor = UserSetor::find($id)->where('status', 'ativo')->get();

        return $userSetor;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setor $setor, $id)
    {

        try{
            $userSetor = UserSetor::find($id);

            $userSetor->fk_user = isset($request->fk_user) ? $request->fk_user : $userSetor->fk_user;
            $userSetor->fk_setor = isset($request->fk_setor) ? $request->fk_setor : $userSetor->fk_setor;
            $userSetor->data_entrada = isset($request->data_entrada) ? $request->data_entrada : $userSetor->data_entrada;
            $userSetor->data_saida = isset($request->data_saida) ? $request->data_saida : $userSetor->data_saida;
            $userSetor->status = isset($request->status) ? $request->status : $userSetor->status;

            $userSetor->save();

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

        $setor = UserSetor::find($id);
        $setor->status = 'inativo';
        $setor->save();

        return response()->json(array('status' => "OK"));
    }
}
