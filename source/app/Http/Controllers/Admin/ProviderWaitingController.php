<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller,
	App\Http\Requests\Admin\FormProviderRequest,
	App\Models\PrProviders,
	App\Models\PrTypes,
	App\Models\Categories,
	Illuminate\Http\Request,
	Datatables;

class ProviderWaitingController extends Controller {

	const NAMEC = 'provider-waiting';
	const NAMEC_PROVIDER = 'provider';

	public function getIndex() {




		return viewc('admin.' . self::NAMEC . '.index');
	}

	public function getList(Request $request) {
		$dataProvider = new PrProviders();
		$table = $dataProvider->ProviderForDataTable('=','ok');
		$datatable = Datatables::of($table)
				->addColumn('action', function($table) {
			return '<a href="/admpanel/' . self::NAMEC_PROVIDER . '/form/' . $table->id . '/provider-waiting" class="btn-actions icon icon-pen"></a>
					<a href="javascript:;" data-url="/admpanel/' . self::NAMEC_PROVIDER . '/delete/' . $table->id . '" class="btn-actions icon icon-' . $table->estado . ' js-change-confirm" title="' . $table->estado . '" data-status="' . $table->estado . '" data-id="' . $table->id . '" ></a>';
		
		});

		return $datatable->make(true);
	}

	public function getForm($id = null) {
		$dataAdmin = new PrProviders();
		$modelProviders = new PrTypes();
		$modelCategories = new Categories();
		$listProviders = $modelProviders->where('flagactive', PrTypes::STATE_ACTIVE)->lists('name_type', 'id')->toArray();
		$listProviders = [null => 'Select un tipo'] + $listProviders;
		$listCategories = $modelCategories->where('flagactive', Categories::STATE_ACTIVE)->lists('name_category', 'id')->toArray();
		$listCategories = [null => 'Select una categoria'] + $listCategories;
		if (!is_null($id)) {
			$dataAdmin = PrProviders::find($id);
		}
		return viewc('admin.' . self::NAMEC . '.form', compact('dataAdmin', 'listProviders'), ['listCategories' => $listCategories,
			'listCategories' => $listCategories
		]);
	}

	public function postForm(FormProviderRequest $request) {
		$id = $request->input('id', NULL);
		$message = "Se ingresó correctamente el proveedor.";

		$modelProvider = new PrProviders();

		$data = $request->all();

		try {
			if ((isset($id)) && ($id != '')) {
				$provider = $modelProvider->find($id);

				$provider->fill($data);

				$provider->save();

				$message = "Se actualizó la información del proveedor de manera correcta.";
			} else {

				$modelProvider->fill($data);

				$modelProvider->save($data);
			}
		} catch (Exception $ex) {
			
		}

		return redirect('admpanel/provider')->with('messageSuccess', $message);
	}

}
