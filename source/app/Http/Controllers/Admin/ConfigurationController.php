<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller,
	App\Http\Requests\Admin\FormConfigurationRequest,
	App\Models\Configuration;

class ConfigurationController extends Controller {

	const NAMEC = 'configuration';

	public function getIndex() {
		$dataConfiguration = Configuration::first();
		if (!isset($dataConfiguration)) {
			$dataConfiguration = new Configuration();
		}
		return viewc('admin.' . self::NAMEC . '.index', compact('dataConfiguration'));
	}

	public function postIndex(FormConfigurationRequest $request) {
		if (!empty($request)) {
			$dataConfiguration = $request->all();
			if ($request->id) {
				$obj = Configuration::find($request->id);
				$obj->update($dataConfiguration);
			}
			return redirect('admpanel/' . self::NAMEC)->with('messageSuccess', 'Caracteristicas Guardado');
		}
		return redirect('admpanel')->with('messageError', 'Error al guardar la configuración');
	}

}
