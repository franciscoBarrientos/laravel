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
        if ($this->method() == 'PUT'){
            // Update operation, exclude the record with id from the validation:
            $record_number_rule = 'required|numeric|unique:pets,record_number,' . $this->get('id');
        }else{
            // Create operation. There is no id yet.
            $record_number_rule = 'required|numeric|unique:pets';
        }

        return [
              'name' => 'required'
            , 'sex' => 'required'
            , 'birth_date' => 'required'
            , 'breed_id' => 'required|numeric|min:1'
            , 'record_number' => $record_number_rule
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es requerido.',
            'sex.required' => 'El sexo es requerido.',
            'birth_date.required' => 'La fecha de nacimiento es requerida.',
            'breed_id.required' => 'La raza es requerida.',
            'breed_id.numeric' => 'Debe seleccionar una raza.',
            'breed_id.min' => 'Debe seleccionar una raza.',
            'record_number.required' => 'El número de ficha es requerido',
            'record_number.numeric' => 'El ',
            'record_number.min' => 'required|numeric|min:1'
        ];
    }
}
