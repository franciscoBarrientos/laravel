<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class ClientCreateRequest extends Request
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
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'rut' => 'required|min:9|max:10',
            'address' => 'required',
            'cellphone' => 'min:8|max:12',
            'phone' => 'min:8|max:12',
            'email' => 'required|email',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es requerido.',
            'name.min' => 'El nombre debe tener al menos 3 caractéres.',
            'lastname.required' => 'El apellido es requerido.',
            'lastname.min' => 'El apellido debe tener al menos 3 caractéres.',
            'rut.required' => 'El RUT es requerido.',
            'rut.min' => 'El RUT debe tener al menos 9 caractéres.',
            'rut.max' => 'El RUT debe tener como máximo 10 caractéres.',
            'address.required' => 'La dirección es requerida.',
            'cellphone.min' => 'El celular debe tener al menos 8 caractéres.',
            'cellphone.max' => 'El celular debe como máximo 12 caractéres.',
            'phone.min' => 'El teléfono debe tener al menos 8 caractéres.',
            'phone.max' => 'El teléfono debe como máximo 12 caractéres.',
            'email.required' => 'El email es requerido.',
            'email.email' => 'El email ingresado no es válido.',
        ];
    }
}
