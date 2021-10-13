<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'text_usuario' => ['required', 'email'],
            'text_senha' => ['required', 'min:4', 'max:20']
        ];
    }

    public function messages(){
        return [
            'text_usuario.required' => 'Campo email Obrigatorio',
            'text_usuario.email' => 'Introduza um endereco email valido',
            'text_senha.required' => 'Campo senha Obrigatorio',
            'text_senha.min' => 'A senha tem que ter no minimo :min caracteres',
            'text_senha.max' => 'A senha tem que ter no maximo :max caracteres'
        ];
    }
}
