<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class guardaRequest extends FormRequest
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
            'nome' => ['required', 'min:4', 'max:100'],
            'apelido' => ['required', 'min:4', 'max:100'],
            'nascimento' => ['required'],
            'bi' => ['required',],
            'posto' => ['required']
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'Campo Nome Obrigatorio',
            'apelido.required' => 'Campo Apelido Obrigatorio',
            'nascimento' => 'Campo Apelido Obrigatorio',
            'bi' => 'Campo B.I Obrigatorio',
            'posto' => 'Campo Posto Obrigatorio'
        ];
    }
}
