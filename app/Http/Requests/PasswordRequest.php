<?php

namespace Veterinaria\Http\Requests;

use Veterinaria\Http\Requests\Request;

class PasswordRequest extends Request
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
            'email' => 'required|email',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'El email es requerido',
            'email.email' => 'El email ingresado es incorrecto',
            'g-recaptcha-response.required' => 'El reCaptcha es requerido.',
            'g-recaptcha-response.captcha'  => 'Eres un robot.',
        ];
    }
}
