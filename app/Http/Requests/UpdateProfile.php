<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfile extends FormRequest
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
        if (Auth::guard('user')->check()) {
            return [
                'nome' => 'required|string|max:100',
                'data_nasc' => 'required|date|after:1950/01/01|before:' . date('Y-m-d'),
                'genero' => 'required',
            ];
        }

        return [
            'nome' => 'required|max:100', //
            'cep' => 'required|max:9', //17021-000
            'cidade' => 'required|max:100', //
            'uf' => 'required|max:2', //
            'bairro' => 'required|max:100', //
            'endereco' => 'required|max:100', //
            'numero' => 'required|max:10', //
            'fone' => 'required|max:15', //(14) 99904-0647
        ];
    }
}
