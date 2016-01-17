<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class PetCreateRequest extends Request
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
            //
            'name' => 'required'
            , 'sex' => 'required'
            , 'birthDate' => 'required'
            , 'breed_id' => 'required|numeric|min:1'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es requerido.',
            'sex.required' => 'El sexo es requerido.',
            'birthDate.required' => 'La fecha de nacimiento es requerida.',
            'breed_id.required' => 'La raza es requerida.',
            'breed_id.numeric' => 'Debe seleccionar una raza.',
            'breed_id.min' => 'Debe seleccionar una raza.',
        ];
    }
}
