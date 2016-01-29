<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller,
	App\Http\Requests\Admin\FormProviderRequest,
	App\Models\PrProviders,
	App\Models\PrPictures,
	App\Models\PrComments,
	App\Models\PrTypes,
	Validator,
	DB,
	App,
	App\Models\Categories,
	Illuminate\Http\Request,
	Datatables;

class ProviderController extends Controller {

	const NAMEC = 'provider';

	public function getIndex() {

		return viewc('admin.' . self::NAMEC . '.index');
	}

	public function getPosts($idUser) {
		$dataUser = User::find($idUser);
		return viewc('admin.' . self::NAMEC . '.posts', compact('dataUser'));
	}

	public function getAssessment($idProvider) {
		$dataProvider = PrProviders::find($idProvider);
		return viewc('admin.' . self::NAMEC . '.assessment', compact('dataProvider'));
	}

	public function getList(Request $request) {
		$dataProvider = new PrProviders();
		$table = $dataProvider->ProviderForDataTable('!=', null);
		$datatable = Datatables::of($table)
				->editColumn('picture_face', '<img src="{{$picture_face}}" heigth=64" width="64" />')
				->addColumn('action', function($table) {
			return '<a href="/admpanel/' . self::NAMEC . '/form/' . $table->id . '" class="btn-actions icon icon-pen"></a>
				<a title="Ver Valoraciones" href="/admpanel/' . self::NAMEC . '/assessment/' . $table->id . '" class="btn-actions icon icon-comments"></a>
			<a href="javascript:;" data-url="/admpanel/' . self::NAMEC . '/delete/' . $table->id . '" class="btn-actions icon icon-' . $table->estado . ' js-change-confirm" title="' . $table->estado . '" data-status="' . $table->estado . '" data-id="' . $table->id . '" ></a>';
		});

		return $datatable->make(true);
	}

	public function getListAssessment(Request $request, $idProvider) {
		$dataProvider = new PrComments();
		$table = $dataProvider->AllCommentForProviderForDataTable($idProvider);
		$datatable = Datatables::of($table)
				->editColumn('picture_user', '<img src="{{$picture_user}}" heigth=64" width="64" />')
				->editColumn('picture_comment', '<img src="{{$picture_comment}}" heigth=64" width="64" />')
				->addColumn('action', function($table) {
			return '<a href="javascript:;" data-url="/admpanel/' . self::NAMEC . '/delete-assessment/' . $table->id . '" class="btn-actions icon icon-' . $table->estado . ' js-change-confirm" title="' . $table->estado . '" data-status="' . $table->estado . '" data-id="' . $table->id . '" ></a>';
		});

		return $datatable->make(true);
	}

	public function getForm($id = null, $modulo = null) {
		$dataProvider = new PrProviders();
		$modelProviders = new PrTypes();
		$modelCategories = new Categories();
		$listProviders = $modelProviders->where('flagactive', PrTypes::STATE_ACTIVE)->lists('name_type', 'id')->toArray();
		$listProviders = [null => 'Select un tipo'] + $listProviders;
		$listCategories = $modelCategories->where('flagactive', Categories::STATE_ACTIVE)->lists('name_category', 'id')->toArray();
		$listCategories = [null => 'Select una categoria'] + $listCategories;
		if (!is_null($id)) {
			$dataProvider = PrProviders::find($id);
			$dataProvider->picture_face = !empty($dataProvider->picture_face) ? $dataProvider->picture_face : null;
		}
		return viewc('admin.' . self::NAMEC . '.form', compact('dataProvider', 'listProviders', 'modulo'), ['listCategories' => $listCategories,
			'listCategories' => $listCategories
		]);
	}

	public function postForm(FormProviderRequest $request) {
		$id = $request->input('id', NULL);
		$message = "Se ingresó correctamente el proveedor.";

		$modelProvider = new PrProviders();

		$data = $request->all();
		if ($request->hasfile('picture_face')) {
			$validator = Validator::make($request->all(), [
						'picture_face' => ['mimes:jpg,png,jpeg'/* ,'required_without:nameimage' */],
			]);
			if ($validator->fails()) {
				return redirect(action('Admin\ProviderController@postForm'))->withErrors($validator)
								->withInput();
			}
			$file = $request->file('picture_face');
			$nameimage = date('Ymdhis') . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
			$file->move(public_path() . "/dinamic/provider/", $nameimage);
			$pathImage = '/dinamic/provider/' . $nameimage;
			$data['picture_face'] = $pathImage;
		}

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
		$url = (isset($data['modulo'])) ? str_replace("|", "/", $data['modulo']) : self::NAMEC;
		return redirect('admpanel/' . $url)->with('messageSuccess', $message);
	}

	public function getDelete($id) {
		$result = array('state' => 0, 'msg' => '');
		try {
			if (!$id)
				throw new \Exception("Id de provider vacio");
			$user = PrProviders::whereId($id)->first();
			$flagactive = ($user->flagactive == 0) ? 1 : 0;
			$user->update(['id' => $id, 'flagactive' => $flagactive]);
			$result['state'] = 1;
		} catch (\Exception $e) {
			$result['msg'] = $e->getMessage();
		}
		return response()->json($result);
	}

	public function getDeleteAssessment($id) {
		$result = array('state' => 0, 'msg' => '');
		try {
			if (!$id)
				throw new \Exception("Id de valoración vacio");
			$user = PrComments::whereId($id)->first();
			$flagactive = ($user->flagactive == 0) ? 1 : 0;
			$user->update(['id' => $id, 'flagactive' => $flagactive]);
			$result['state'] = 1;
		} catch (\Exception $e) {
			$result['msg'] = $e->getMessage();
		}
		return response()->json($result);
	}

	public function postDeleteImageProviderPremium(Request $request) {
		$result = array('state' => 0, 'msg' => '');
		try {
			$dataImageProvider = $request->all();
			$idPictureProvider = $dataImageProvider['key'];
			if (!$idPictureProvider)
				throw new \Exception("Id de imagen vacio");
			\App\Models\PrPictures::whereId($idPictureProvider)->forceDelete();
			$result['state'] = 1;
		} catch (\Exception $e) {
			$result['msg'] = $e->getMessage();
		}
		return response()->json($result);
	}

	public function getImageProviderPremium($idProvider) {
		$result = array('state' => 0, 'msg' => '');
		try {
			if (!$idProvider)
				throw new \Exception("Id de proveedor vacio");
			$dataPictureprovider = PrPictures::wherePrProviderId($idProvider)->whereFlagactive(1)
					->select('pr_pictures.*', DB::raw('CONCAT("' . asset('') . '", pr_pictures.url) AS url'))
					->get();
			$result['data'] = $dataPictureprovider;
			$result['state'] = 1;
		} catch (\Exception $e) {
			$result['msg'] = $e->getMessage();
		}
		return response()->json($result);
	}

	public function postImageProviderPremium(Request $request) {
		$result = array('state' => 0, 'msg' => '');
		try {
			$dataImageProvider = $request->all();
			$prPictureTotal = PrPictures::wherePrProviderId($dataImageProvider['pr_provider_id'])->select(DB::raw('COUNT(id) as total'))->first();
			if($prPictureTotal->total>=4){
				$result['msg'] = 'Ya no puede subir más imagenes';
			return response()->json($result);	
			}
			if (!$dataImageProvider['pr_provider_id'])
				throw new \Exception("Id de proveedor vacio");
			if (isset($dataImageProvider['picture_provider'])) {
				$file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataImageProvider['picture_provider']));
				$dataPicture['name_picture'] = date('YmdHis') . rand(1, 1000) . ".jpg";
				$pathrelative = "/dinamic/providers-data/" . $dataPicture['name_picture'];
				$path = App::publicPath() . $pathrelative;
				file_put_contents($path, $file);
				$dataPicture['url'] = $pathrelative;
				$dataPicture['pr_provider_id'] = $dataImageProvider['pr_provider_id'];
				$objImageProvider = PrPictures::create($dataPicture);
			}
			$result['data'] = ['id' => $objImageProvider->id];
			$result['state'] = 1;
		} catch (\Exception $exc) {
			$result['msg'] = $exc->getMessage();
		}
		return response()->json($result);
	}

}
