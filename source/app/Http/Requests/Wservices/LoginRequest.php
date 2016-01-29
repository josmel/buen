<?php

namespace App\Http\Requests\Wservice;

use App\Http\Requests\RequestWservice;

class LoginRequest extends RequestWservice {

    public function authorize() {

        return true;
    }

    public function rules() {
        $rules = [
            'email' => 'required',
//            'password' => 'required',
             'idfacebook' => 'required',
             'tokendevice' => 'required',
             'typedevice' => 'required|in:1,2'
        ];
        return $rules;
    }

    public function messages() {
        return [
            'required' => 'El campo :attribute es requerido.',
            'min' => 'El :attribute debe ser de al menos 2 caracteres.',
        ];
    }

}
