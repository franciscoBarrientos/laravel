<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class AlertRequest extends Request
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
            'alerts_type_id'    =>  'required|numeric',
            'pets_id'           =>  'required|numeric',
            'description'       =>  'required',
            'date'              =>  'required'
        ];
    }

    public function messages(){
        return [
            'alerts_type_id.required'   =>  'El tipo de alerta es requerido.',
            'alerts_type_id.numeric'    =>  'El tipo de alerta debe ser un número.',
            'pets_id.required'          =>  'La mascota es requerida.',
            'pets_id.numeric'           =>  'La mascota debe ser un número.',
            'description.required'      =>  'La descripción es requerida.',
            'date.required'             =>  'La fecha es requerida.'
        ];
    }
}
