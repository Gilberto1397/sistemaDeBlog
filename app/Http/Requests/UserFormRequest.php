<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserFormRequest extends FormRequest
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
            'email' => 'required|string|email',
            'user' => 'required|string',
            'password' => 'required|string|min:8'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Você precisa informar o campo "E-mail"!',
            'email.string' => 'O valor inserido no campo "E-mail" é inválido!',
            'user.required' => 'Você precisa informar o campo "Usuário"!',
            'user.string' => 'O valor inserido no campo "Usuário" é inválido!',
            'password.required' => 'Você precisa informar o campo "Senha"!',
            'password.string' => 'O valor inserido no campo "Senha" é inválido!',
            'password.min' => 'A senha deve conter ao menos 8 dígitos!',
        ];
    }
}
