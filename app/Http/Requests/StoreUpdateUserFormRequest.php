<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
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
        $idUser = $this->id ?? '';
        $rules = [
            'name' => [
                'required',
                'string',
                'max:255',
                'min:3'
            ],
            'email' => [
                'required',
                'email', 
                "unique:users,email,{$idUser},id"
            ],
            'password' => [
                'required',
                'min:6',
                'max:15'
            ],
            'image' => [
                'nullable', //opicional da imagem
                'image',
                'max:2048' //tamanho da imagem
            ]
        ];

        if($this->method('PUT')){
            $rules['password'] = [
                'nullable',
                'min:6',
                'max:15'
            ];
        }
        return $rules;
    }
}
