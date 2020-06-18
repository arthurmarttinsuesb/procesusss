<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDocumentoTramite extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        if($this->envio=='setor'){
            return [
                'assinatura' =>'required',
                'envio' =>'required',
                'setor' =>'required'
            ];
        }else if($this->envio=='colaborador'){
                return [
                    'assinatura' =>'required',
                    'envio' =>'required',
                    'usuario' =>'required'
                ];
            }
    }

    public function attributes(){
        return [
                'assinatura' =>'Assinatura',
                'envio' =>'Enviar Para',
                'setor' =>'Setor',
                'usuario' =>'Colaborador',
           ];
    }
}
