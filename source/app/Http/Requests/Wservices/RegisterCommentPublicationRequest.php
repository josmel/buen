<?php

namespace App\Http\Requests\Wservice;

use App\Http\Requests\RequestWservice;

class RegisterCommentPublicationRequest extends RequestWservice {

    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $provider = 0;
        if ($this->input('pr_provider_id')) {
            $provider = $this->input('pr_provider_id');
        }
        if ($provider != 0) {
            $rules = [
                'pr_provider_id' => 'required|exists:pr_providers,id,datedelete,NULL',
                'pu_ad_id' => 'required|exists:pu_ads,id,datedelete,NULL,flagactive,1',
                'description' => 'required'
            ];
        } else {
            $rules = [
                'pu_ad_id' => 'required|exists:pu_ads,id,datedelete,NULL,flagactive,1',
                'description' => 'required'
            ];
        }
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
