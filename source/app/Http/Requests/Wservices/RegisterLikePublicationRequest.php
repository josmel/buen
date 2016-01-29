<?php

namespace App\Http\Requests\Wservice;

use App\Http\Requests\RequestWservice;

class RegisterLikePublicationRequest extends RequestWservice {

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
                'pu_ad_id' => 'required|exists:pu_ads,id,datedelete,NULL,flagactive,1',
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
