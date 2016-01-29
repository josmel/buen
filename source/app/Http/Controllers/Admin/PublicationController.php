<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller,
	Illuminate\Http\Request,
	App\Models\PuAds,
	App\Models\PuTypes,
	App\Models\PuPicture,
	App\Models\PuComments,
	App\Http\Requests\Admin\FormPublicationRequest,
	App\Models\Categories,
	Validator,
	Datatables;

class PublicationController extends Controller {

	const NAMEC = 'publication';

	public function getIndex() {
		return viewc('admin.' . self::NAMEC . '.index');
	}

	public function getComment() {
		return viewc('admin.' . self::NAMEC . '.form-comment');
	}

	public function getList(Request $request) {
		try {
			$PuPosts = new PuAds();
			$table = $PuPosts->PostForDataTable(null, null);
			$datatable = Datatables::of($table)
					->editColumn('picture_publication', '<img src="{{$picture_publication}}" heigth=64" width="64" />')
					->addColumn('action', function($table) {
				return '<a href="/admpanel/' . self::NAMEC . '/form/' . $table->id . '" class="btn-actions icon icon-pen"></a>
				<a href="javascript:;" data-url="/admpanel/' . self::NAMEC . '/update-type/' . $table->id . '" class="btn-actions icon icon-smiley ' . $table->premium . ' js-premium-confirm" title="' . $table->premium . '" data-status="' . $table->premium . '" data-id="' . $table->id . '" ></a>
				<a href="javascript:;" data-url="/admpanel/' . self::NAMEC . '/delete/' . $table->id . '" class="btn-actions icon icon-' . $table->estado . ' js-change-confirm" title="' . $table->estado . '" data-status="' . $table->estado . '" data-id="' . $table->id . '" ></a>
					<a alt="Comentarios"  title="Comentarios" href="/admpanel/' . self::NAMEC . '/comments/' . $table->id . '" class="btn-actions icon icon-comments"></a>';
			});
			return $datatable->make(true);
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
			exit;
		}
	}

	public function getForm($id = null, $modulo = null) {
		$modelCategories = new Categories();
		$listTypes = PuTypes::whereFlagactive(PuTypes::STATE_ACTIVE)->lists('name_type', 'id')->toArray();
		$listTypes = [null => 'Select un tipo'] + $listTypes;
		$listCategories = $modelCategories->where('flagactive', Categories::STATE_ACTIVE)->lists('name_category', 'id')->toArray();
		$listCategories = [null => 'Select una categoria'] + $listCategories;
		$dataPost = PuAds::find($id);
		if (!is_null($id)) {
			$dataPost = PuAds::find($id);
			$dataPicture = PuPicture::wherePuAdId($id)->first();
			$dataPost->picture = !empty($dataPicture->url) ? "{$dataPost->picture}" : null;
			$dataPost->pr_provider_id = !empty($dataPost->pr_provider_id) ? "{$dataPost->pr_provider_id}" : 0;
		}
		return viewc('admin.' . self::NAMEC . '.form', compact('dataPost', 'modulo'), ['listCategories' => $listCategories,
			'listTypes' => $listTypes]);
	}

	public function getFormComment($id = null, $modulo = null) {
		$dataPostComments = PuComments::find($id);
		if (!is_null($id)) {
			$dataPostComments = PuComments::find($id);
			$dataPostComments->pr_provider_id = !empty($dataPostComments->pr_provider_id) ? "{$dataPostComments->pr_provider_id}" : 0;
		}
		return viewc('admin.' . self::NAMEC . '.form-comment', compact('dataPostComments', 'modulo'));
	}

	public function postFormComment(Request $request) {
		$id = $request->input('id', NULL);
		$message = "Se ingresó correctamente el comentario de la publicación.";
		$modelPostComment = new PuComments();
		$data = $request->all();
		if ($request->hasfile('picture')) {
			$validator = Validator::make($request->all(), [
						'picture' => ['mimes:jpg,png,jpeg'/* ,'required_without:nameimage' */],
			]);
			if ($validator->fails()) {
				return redirect(action('Admin\PublicationController@postFormComment'))->withErrors($validator)
								->withInput();
			}
			$file = $request->file('picture');
			$nameimage = date('Ymdhis') . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
			$file->move(public_path() . "/dinamic/pu_comment/", $nameimage);
			$pathImage = '/dinamic/pu_comment/' . $nameimage;
			$data['picture'] = $pathImage;
		}
		try {
			if ((isset($id)) && ($id != '')) {
				$Post = $modelPostComment->find($id);
				$Post->fill($data);
				$Post->save();
				$message = "Se actualizó la información del comentario de la  publicación de manera correcta.";
			} else {
				$modelPostComment->fill($data);
				$modelPostComment->save($data);
			}
		} catch (Exception $ex) {
			
		}
		$url = (isset($data['modulo'])) ? str_replace("|", "/", $data['modulo']) : self::NAMEC;
		return redirect('admpanel/' . $url)->with('messageSuccess', $message);
	}

	public function postForm(FormPublicationRequest $request) {
		$id = $request->input('id', NULL);
		$message = "Se ingresó correctamente la publicación.";
		$modelPost = new PuAds();
		$data = $request->all();
		if ($request->hasfile('picture')) {
			$validator = Validator::make($request->all(), [
						'picture' => ['mimes:jpg,png,jpeg'/* ,'required_without:nameimage' */],
			]);
			if ($validator->fails()) {
				return redirect(action('Admin\PublicationController@postForm'))->withErrors($validator)
								->withInput();
			}
			$file = $request->file('picture');
			$nameimage = date('Ymdhis') . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
			$file->move(public_path() . "/dinamic/publication/", $nameimage);
			$pathImage = '/dinamic/publication/' . $nameimage;
			if ((isset($id)) && ($id != '')) {
				PuPicture::wherePuAdId($id)->forceDelete();
				PuPicture::create(['name_picture' => $nameimage, 'url' => $pathImage, 'pu_ad_id' => $id]);
			}
		}
		try {
			if ((isset($id)) && ($id != '')) {
				$Post = $modelPost->find($id);
				$Post->fill($data);
				$Post->save();
				$message = "Se actualizó la información de la publicación de manera correcta.";
			} else {
				$modelProvider->fill($data);
				$idPost = $modelPost->save($data);
				if ($request->hasfile('picture')) {
					PuPicture::create(['name_picture' => $nameimage, 'url' => $pathImage, 'pu_ad_id' => $idPost]);
				}
			}
		} catch (Exception $ex) {
			
		}
		$url = (isset($data['modulo'])) ? str_replace("|", "/", $data['modulo']) : self::NAMEC;
		return redirect('admpanel/' . $url)->with('messageSuccess', $message);
	}

	public function getComments($idPost) {
		$dataPost = PuAds::find($idPost);
		return viewc('admin.' . self::NAMEC . '.comments', compact('dataPost'));
	}

	public function getListComments(Request $request, $idPost) {
		try {
			$PuCOmments = new PuComments();
			$table = $PuCOmments->CommentsForUser(null, $idPost);
			$datatable = Datatables::of($table)
					->editColumn('picture', '<img src="{{$picture}}" heigth=64" width="64" />')
					->addColumn('action', function($table) {
				return '<a href="/admpanel/' . self::NAMEC . '/form-comment/' . $table->id . '/' . self::NAMEC . '|comments|' . $table->pu_ad_id . '" class="btn-actions icon icon-pen"></a>
				<a href="javascript:;" data-url="/admpanel/' . self::NAMEC . '/delete-comments/' . $table->id . '" class="btn-actions icon icon-' . $table->estado . ' js-change-confirm" title="' . $table->estado . '" data-status="' . $table->estado . '" data-id="' . $table->id . '" ></a>';
			});
			return $datatable->make(true);
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
			exit;
		}
	}

	public function getDelete($id) {
		$result = array('state' => 0, 'msg' => '');
		try {
			if (!$id)
				throw new \Exception("Id de Post vacio");
			$user = PuAds::whereId($id)->first();
			$flagactive = ($user->flagactive == 0) ? 1 : 0;
			$user->update(['id' => $id, 'flagactive' => $flagactive]);
			$result['state'] = 1;
		} catch (\Exception $e) {
			$result['msg'] = $e->getMessage();
		}
		return response()->json($result);
	}

	public function getUpdateType($id) {
		$result = array('state' => 0, 'msg' => '');
		try {
			if (!$id)
				throw new \Exception("Id de Post vacio");

			$modelAds = new PuAds();
			$modelTypeAds = new PuTypes();
			$dataAds = $modelAds->getAdsType($id, null);
			switch ($dataAds->name_type) {
				case PuTypes::TYPE_PREMIUM:
					$type = $this->dataPremium($id);
					break;
				default:
					$dataPremium = PuAds::wherePuTypeId($modelTypeAds->getIdPuType(PuTypes::TYPE_PREMIUM))
						->whereFlagactive(1)->first();
					if ($dataPremium) {
						$typePremium = $this->dataPremium($dataPremium->id);
						$adsPremium = PuAds::find($dataPremium->id);
						$adsPremium->update(['pu_type_id' => $typePremium]);
					}
					$type = $modelTypeAds->getIdPuType(PuTypes::TYPE_PREMIUM);
					break;
			}
			$ads = PuAds::find($id);
			$ads->update(['pu_type_id' => $type]);
			$result['state'] = 1;
		} catch (\Exception $e) {
			$result['msg'] = $e->getMessage();
		}
		return response()->json($result);
	}

	public function dataPremium($idPost) {
		$modelAds = new PuAds();
		$modelTypeAds = new PuTypes();
		$modelConfig = \App\Models\Configuration::whereFlagactive(1)->first();
		$dataComentario = $modelAds->getAdsType($idPost, 2);
		$dataLike = $modelAds->getAdsType($idPost, 1);
		if ($dataComentario->comentario >= $modelConfig->limit_datear || $dataLike->likes >= $modelConfig->limit_buen_dato) {
			$type = $modelTypeAds->getIdPuType(PuTypes::TYPE_POPULAR);
		} else {
			$type = $modelTypeAds->getIdPuType(PuTypes::TYPE_COMUN);
		}
		return $type;
	}

	public function getDeleteComments($id) {
		$result = array('state' => 0, 'msg' => '');
		try {
			if (!$id)
				throw new \Exception("Id de Comment vacio");
			$user = PuComments::whereId($id)->first();
			$flagactive = ($user->flagactive == 0) ? 1 : 0;
			$user->update(['id' => $id, 'flagactive' => $flagactive]);
			$result['state'] = 1;
		} catch (\Exception $e) {
			$result['msg'] = $e->getMessage();
		}
		return response()->json($result);
	}

}
