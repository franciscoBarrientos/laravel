<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class UserCreateRequest extends Request
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
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email ingresado es incorrecto',
            'email.unique' => 'El email ingresado ya existe',
            'email.password' => 'La contraseña ingresada es requerida',
        ];
    }
}
