<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'title' => 'required|string',
            'postContent' => 'required|string',
            'image' => 'filled|image'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O título do post é obrigatório!',
            'title.string' => 'O título do post deve ser um texto!',
            'content.required' => 'O conteúdo do post é obrigatório!',
            'content.string' => 'O conteúdo do post deve ser um texto!',
            'image.required' => 'O arquivo escolhido parece estar vazio!',
            'image.image' => 'O arquivo escolhido deve ser uma imagem!'
        ];
    }
}
