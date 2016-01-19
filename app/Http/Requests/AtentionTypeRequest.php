<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class AtentionTypeRequest extends Request
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
            'description' => 'required',
        ];
    }

    public function messages(){
        return [
            'description.required' => 'El tipo de atención es requerida.',
        ];
    }
}
