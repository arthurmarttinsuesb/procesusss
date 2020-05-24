<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDocumento extends FormRequest
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

    public function rules()
    {
        return [
            'titulo' =>'required',
            'tipo' =>'required',
            'descricao' =>['required','min:30'],
            'conteudo' =>'required'
        ];
    }

    public function attributes(){
        return [
            'titulo' =>'Título',
            'tipo' =>'Tipo de Documento',
            'descricao' =>'Descrição',
            'conteudo' =>'Conteúdo'
            ];
    
    }
}
