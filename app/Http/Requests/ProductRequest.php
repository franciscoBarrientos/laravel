<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class ProductRequest extends Request
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
        /*if ($this->method() == 'PUT'){
            // Update operation, exclude the record with id from the validation:
            $quantity_rule = '';
        }else{
            // Create operation. There is no id yet.
            $quantity_rule = 'required|numeric';
        }*/

        return [
            'name'               => 'required'
            ,'product_type_id'   => 'required|numeric'
            ,'provider_id'       => 'required|numeric'
            //,'quantity'          => $quantity_rule
            ,'price'             => 'required|numeric|min:1'
        ];
    }
}
