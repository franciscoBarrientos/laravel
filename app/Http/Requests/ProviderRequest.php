<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class ProviderRequest extends Request
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
            $rut_rule = 'required|numeric|digits_between:7,8|unique:providers,rut,' . $this->get('id');
        }else{
            // Create operation. There is no id yet.
            $rut_rule = 'required|numeric|digits_between:7,8|unique:providers';
        }

        return [
             'fancy_name'       => 'required'
            ,'business_name'    => 'required'
            //,'activity'         => ''
            ,'verifying_digit'  => 'required|min:1|max:1'
            ,'rut'              => $rut_rule
            ,'name'             => 'required'
            ,'email'            => 'required|email'
            ,'phone'            => 'min:8'
        ];
    }

    public function messages(){
        return [
            'fancy_name.required' => 'El nombre de fantasía es requerido.',
            'business_name.required' => 'La razón social es requerida.',
            'verifying_digit.required' => 'El dígito verificador es requerido.',
            'verifying_digit.min' => 'El dígito verificador debe contener al menos 1 caracter.',
            'verifying_digit.max' => 'El dígito verificador debe contener como máximo 1 caracter.',
            'rut.required' => 'El RUT es requerido.',
            'rut.digits_between' => 'El largo del RUT debe ser entre 7 y 8 números.',
            'rut.unique' => 'El RUT ingresado ya existe.',
            'name.required' => 'El nombre de contacto es requerido.',
            'email.required' => 'El email es requerido.',
            'email.email' => 'El email ingresado no es válido.',
            'phone.min' => 'El teléfono debe contener al menos 8 caracteres.',
        ];
    }
}
