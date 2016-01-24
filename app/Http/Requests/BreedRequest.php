<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class BreedRequest extends Request
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
            'name'=>'required',
            'species_id'=>'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es requerido.',
            'species_id.required' => 'La especie es requerida.',
        ];
    }
}
