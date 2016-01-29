<?php

namespace App\Http\Requests\Wservice;

use App\Http\Requests\RequestWservice;

class RegisterCommentProviderRequest extends RequestWservice {

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
            'pr_provider_id' => 'required|exists:pr_providers,id,datedelete,NULL,flagactive,1',
            'description' => 'required',
            'punctuation' => "required|in:1,2,3,4,5"
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
