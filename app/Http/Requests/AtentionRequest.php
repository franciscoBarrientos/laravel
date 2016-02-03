<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class AtentionRequest extends Request
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
            'pet_id' => 'required',
            'atentions_type_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'pet_id.required' => 'El id de mascota es requerido.',
            'atentions_type_id.required' => 'El tipo de atención es requerido.',
        ];
    }
}
