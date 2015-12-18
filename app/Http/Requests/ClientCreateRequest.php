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
            'rut' => 'required|min:10|max:10',
            'address' => 'required',
            'cellphone' => 'required|min:8|max:15',
            'phone' => 'required|min:8|max:12',
            'email' => 'required|email',
        ];
    }
}
