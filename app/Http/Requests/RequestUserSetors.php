<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUserSetors extends FormRequest
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
            'fk_user' => 'required',
            'fk_setor' => 'required',
            'tipo' => 'required',
            'data_entrada' => 'required',
        ];
    }

    public function attributes(){
        return [
            'fk_user' => 'Usuário',
            'fk_setor' => 'Setor',
            'tipo' => 'Tipo',
            'data_entrada' => 'Data de Entrada',
        ];

    }
}
