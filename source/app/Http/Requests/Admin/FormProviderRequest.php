<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class FormProviderRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $iduser = 0;
        if ($this->input('id')) {
            $iduser = $this->input('id');
        }
        switch ($iduser) {
            case 0:
                return [
                    // 'email' => 'required|unique:users,email,NULL,id,datedelete,NULL',
                    // 'password' => 'required',
                    'name_provider' => 'required',
                    // 'lastname' => 'required'
                ];
            default:
                return [ 
                    // 'email' => 'required|unique:users,email,' . $iduser . ',id,datedelete,NULL',
                    // 'name' => 'required',
                    'name_provider' => 'required'];
        }
    }

    public function messages() {
        return [
            'required' => 'El campo :attribute es requerido.'
        ];
    }

}
