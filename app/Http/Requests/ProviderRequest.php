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
        if ($this->method() == 'PUT')
        {
            // Update operation, exclude the record with id from the validation:
            $rut_rule = 'required|digits:8|unique:providers,rut,' . $this->get('id');
        }
        else
        {
            // Create operation. There is no id yet.
            $rut_rule = 'required|digits:8|unique:providers';
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
}
