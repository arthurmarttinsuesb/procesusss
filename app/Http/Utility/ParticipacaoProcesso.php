<?php

namespace App\Http\Utility;
use Auth;
use DB;
use Redirect;

use App\Processo;
use App\ProcessoTramitacao;

class ParticipacaoProcesso {

//    public static function texto($texto, $limite){
//         $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
//         return $texto;
//     }

public static function participacao_processo_user($user,$processo){

    $processo_tramitacao = ProcessoTramitacao::where('fk_processo', $processo)->where('fk_user',$user)->get();
    $processo = Processo::where('fk_user', $user)->where('id',$processo)->get();
        
        if($processo_tramitacao->count()>0 || $processo->count()>0){
            return true;
        }else{
            return false;
        }
    }

public static function participacao_processo_setor($setor,$processo){

    $processo_tramitacao = ProcessoTramitacao::where('fk_setor', $setor)->where('fk_processo', $processo)->get();
        
        if($processo_tramitacao->count()>0){
            return true;
        }else{
            return false;
        } 
    }
}