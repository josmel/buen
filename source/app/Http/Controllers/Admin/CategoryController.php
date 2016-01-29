<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller,
	Datatables,
	App\Http\Requests\Admin\FormCategoryRequest,
	Illuminate\Http\Request,
	Validator,
	App\Models\Categories;

class CategoryController extends Controller {

	const NAMEC = 'category';

	public function getIndex() {
		return viewc('admin.' . self::NAMEC . '.index');
	}

	public function getForm($id = null) {

		$dataCategory = Categories::find($id);
		if (!isset($dataCategory)) {
			$dataCategory = new Categories();
		} else {
			$dataCategory->picture = !empty($dataCategory->picture) ? "{$dataCategory->picture}" : null;
		}
		return viewc('admin.' . self::NAMEC . '.form', compact('dataCategory'));
	}

	public function postForm(FormCategoryRequest $request) {
		if (!empty($request)) {
			$pathImage = $request->get('picture', null);
			$data = $request->all();
			if ($request->hasfile('picture')) {
				$validator = Validator::make($request->all(), [
							'picture' => ['mimes:jpg,png,jpeg'/* ,'required_without:nameimage' */],
				]);
				if ($validator->fails()) {
					return redirect(action('Admin\CategoryController@postForm'))->withErrors($validator)
									->withInput();
				}
				$file = $request->file('picture');
				$nameimage = date('Ymdhis') . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
				$file->move(public_path() . "/dinamic/category/", $nameimage);
				$pathImage = '/dinamic/category/' . $nameimage;
				$data['picture'] = $pathImage;
			}
			$data['flagactive'] = $request->get('flagactive', 1);
			if ($request->id) {
				$obj = Categories::find($request->id);
				$obj->update($data);
				$idTips = $obj->id;
			} else {
				$obj = Categories::create($data);
				$idTips = $obj->id;
			}
			return redirect('admpanel/' . self::NAMEC)->with('messageSuccess', 'Caracteristicas Guardado');
		}
		return redirect('admpanel')->with('messageError', 'Error al guardar el tip');
	}

	public function getList(Request $request) {
		$table = Categories::select('name_category', 'picture', 'id');
		$datatable = Datatables::of($table)
				->editColumn('picture', '<img src="{{$picture}}" heigth=64" width="64" />')
				->addColumn('action', function($table) {
			return '<a href="/admpanel/' . self::NAMEC . '/form/' . $table->id . '" class="btn-actions icon icon-pen"></a>
                            <a href="javascript:;" data-url="/admpanel/' . self::NAMEC . '/delete/' . $table->id . '" class="btn-actions icon icon-trash js-delete-confirm"  data-id="' . $table->id . '" ></a>';
		})
		;
		return $datatable->make(true);
	}

	public function getDelete($id) {
		$result = array('state' => 0, 'msg' => '');
		try {
			if (!$id)
				throw new \Exception("Id de Categoria vacio");
			$user = Categories::whereId($id)->first();
			$user->update(['id' => $id, 'flagactive' => 0]);
			 $user->delete();
			$result['state'] = 1;
		} catch (\Exception $e) {
			$result['msg'] = $e->getMessage();
		}
		return response()->json($result);
	}
	
   

}
