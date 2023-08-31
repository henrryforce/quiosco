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
            'name'=> ['required','string'],
            'email'=>['required','email','unique:users,email'],
            'password'=>[
                'required',
                'confirmed',
                PasswordRules::min(8)->letters()->symbols()->numbers()
            ]
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'El Nombre es obligatorio',
            'name.string' => 'El Nombre debe ser de tipo texto',
            'email.required' => 'El Email es obligatorio',
            'email.email' => 'El Email debe tener un formato de email',
            'email.unique' => 'El Email ya esta registrado en la base de datos',
            'password.required' => 'La contraseña es obligatoria',
            'password.confirmed' => 'La contraseña se debe confirmar',
            'password'=>'La contraseña debes ser almenos de 8 caracteres y debe contener almenos un simnbolo especial y numeros'
        ];
    }
}
