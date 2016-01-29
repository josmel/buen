<?php

namespace App\Http\Requests\Wservice;

use App\Http\Requests\RequestWservice;

class RegisterUserRequest extends RequestWservice {

    public function authorize() {


        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $rules = [
            'email' => 'required|unique:users,email,NULL,id,datedelete,NULL',
            'idfacebook' => 'required',
            'picture' => 'required',
            'name' => 'required',
            'lastname' => 'required',
        ];
        return $rules;
    }

    public function messages() {
        return [
            'required' => 'El campo :attribute es requerido.',
            'min' => 'El :attribute debe ser de al menos 2 caracteres.',
            'unique' => 'El :attribute ya existe'
        ];
    }

}
