<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class LoginRequest extends Request {

    public function authorize() {

        return true;
    }

    public function rules() {     
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required',
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
