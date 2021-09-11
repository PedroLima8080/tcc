<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class registerLibraryRequest extends FormRequest
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
            'nome' => 'required|max:100',
            'cnpj' => 'required|min:18|max:18',
            'cep' => 'required|max:9', //17021-000
            'cidade' => 'required|max:100',
            'uf' => 'required|max:2',
            'bairro' => 'required|max:100',
            'endereco' => 'required|max:100',
            'numero' => 'required|max:10',
            'email' => 'required|max:100|email',
            'fone' => 'required|max:15', //(14) 99904-0647
            'password' => 'required|confirmed',
        ];
    }
}
