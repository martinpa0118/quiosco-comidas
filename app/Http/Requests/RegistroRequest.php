<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegistroRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string'],
            'email' => ['required', 'email','unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(8)->letters()->symbols()->numbers()
            ]
        ];
    }
    public function messages()
    {
        return[
            'name' => 'El nombre es obligatorio',
            'email.required' => 'el email es obligatorio',
            'email.email' => 'el email no es válido',
            'email.unique' => 'el usuario ya esta registrado',
            'password' => 'el passoword debe contener al menos 8 caracteres, un simbolo y un numero'
        ];
    }
}
