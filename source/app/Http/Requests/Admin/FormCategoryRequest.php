<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class FormCategoryRequest extends Request {

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
        return [
            'name_category' => 'required',
//            'picture' => 'required',
        ];
    }

    public function messages() {
        return [
            'required' => 'El campo :attribute es requerido.'
        ];
    }

}
