<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class AlertTypeRequest extends Request
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
                'title' => 'required',
                'font_awesome_id' => 'required',
                'color' => 'required'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'El título es requerido.',
            'font_awesome_id.required' => 'El icono es requerido.',
            'color.required' => 'El color es requerido.'
        ];
    }
}
