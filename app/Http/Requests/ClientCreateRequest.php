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
            'client_name' => 'required',
            'client_last_name_p' => 'required',
            'client_last_name_m' => 'required',
            'client_rut' => 'required',
            'client_direction' => 'required',
            'client_cellphone' => 'required',
            'client_phone' => 'required',
        ];
    }
}
