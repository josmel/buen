<?php

namespace App\Http\Requests\Wservice;

use App\Http\Requests\RequestWservice,
    App\Models\Categories;

class RegisterPublicationRequest extends RequestWservice {

    public function authorize() {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $dataCategory = Categories::whereFlagactive(1)->lists('id')->toArray();
        $listCategory = implode(",", $dataCategory);
        $rules = [
            'description' => 'required',
            'pu_category_id' => "required|in:$listCategory"
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
