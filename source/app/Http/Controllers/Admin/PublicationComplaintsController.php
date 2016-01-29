<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller,
	Illuminate\Http\Request,
	App\Models\PuAds,
	Datatables;

class PublicationComplaintsController extends Controller {

	const NAMEC = 'publication-complaints';
	const NAMEC_PUBLICATION = 'publication';

	public function getIndex() {
		return viewc('admin.' . self::NAMEC . '.index');
	}

	public function getList(Request $request) {
		try {
			$PuPosts = new PuAds();
			$table = $PuPosts->PostForDataTable(null,'ok');
			$datatable = Datatables::of($table)
					->editColumn('picture_publication', '<img src="{{$picture_publication}}" heigth=64" width="64" />')
					->addColumn('action', function($table) {
				return '<a href="/admpanel/' . self::NAMEC_PUBLICATION . '/form/' . $table->id . '/'.self::NAMEC.'" class="btn-actions icon icon-pen"></a>
				<a href="javascript:;" data-url="/admpanel/' . self::NAMEC_PUBLICATION . '/delete/' . $table->id . '" class="btn-actions icon icon-' . $table->estado . ' js-change-confirm" title="' . $table->estado . '" data-status="' . $table->estado . '" data-id="' . $table->id . '" ></a>';
			});
			return $datatable->make(true);
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
			exit;
		}
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

}
