<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProcessus extends FormRequest
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
        return [
            'titulo' => 'required',
            'descricao' => 'required',
            'tipo' => 'required',
            'doc' => 'required'

        ];
    }

    public function attributes(){
        return [
            'titulo' =>'Título',
            'descricao' =>'Descrição',
            'tipo' => 'Tipo',
            'doc' => 'Documento'
        ];

    }
}
