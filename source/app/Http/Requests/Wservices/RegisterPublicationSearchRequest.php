<?php

namespace App\Http\Requests\Wservice;

use App\Http\Requests\RequestWservice;

class RegisterPublicationSearchRequest extends RequestWservice {

	public function authorize() {

		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		$description = null;
		if ($this->input('description')) {
			$description = $this->input('description');
		}
		$rules = [];
		if ($description) {
			$rules = [
				'description' => 'required|min:3',
			];
		}
		return $rules;
	}

	public function messages() {
		return [
			'required' => 'El campo :attribute es requerido.',
			'min' => 'El :attribute debe ser de al menos 3 caracteres.',
		];
	}

}
