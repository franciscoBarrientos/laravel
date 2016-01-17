<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class StockRequest extends Request
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
            'quantity'=>'required|numeric|min:1',
            'invoice_number'=>'required|numeric|min:1'
        ];
    }

    public function messages(){
        return [
            'quantity.required' => 'El cantidad es requerida',
            'quantity.numeric' => 'El cantidad debe ser un número',
            'quantity.min' => 'La cantidad mínima es 1',
            'invoice_number.required' => 'El número de factura es requerido',
            'invoice_number.numeric' => 'El número de factura debe ser un número',
            'invoice_number.min' => 'El número de factura es requerido',
        ];
    }
}
