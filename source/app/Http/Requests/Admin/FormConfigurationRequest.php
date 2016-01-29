<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class FormConfigurationRequest extends Request {

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
			'limit_buen_dato' => 'required|integer|min:1',
			'limit_datear' => 'required|integer|min:1',
			'limit_friends' => 'required|integer|min:1',
			'limit_assessment_providers' => 'required|integer|min:1',
		];
	}

	public function messages() {
		return [
			'required' => 'El campo :attribute es requerido.',
			'integer' => 'El campo :attribute es requerido.',
		];
	}

}
