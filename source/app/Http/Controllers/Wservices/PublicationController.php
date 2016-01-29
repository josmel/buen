<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerJWT,
	App\Http\Requests\Wservice\RegisterPublicationRequest,
	App\Http\Requests\Wservice\RegisterPublicationSearchRequest,
	Illuminate\Http\Response,
	App\Models\PuPicture,
	App\Models\PuComments,
	App\Models\PuComplaints,
	Illuminate\Http\Request,
	App\Models\PuAds,
	App;

class PublicationController extends ControllerJWT {

	/**
	 *
	 * @return Response
	 */
	public function index(RegisterPublicationSearchRequest $request) {
		try {
			$dataAdsForUser = new PuAds();
			$idcategories = $request->input('categories_id', 0);
			$idCategory = ($idcategories != 0) ? explode("-", $idcategories) : [];
			$dataAds = $dataAdsForUser->getAllAds($idCategory, $request->input('description'), $request->input('user_id'), $request->input('page'));
			$this->_responseWS->setDataResponse(Response::HTTP_OK, $dataAds, array(), 'ok');
		} catch (Exception $exc) {
			dd($exc->getMessage());
			$this->_responseWS->setDataResponse(
					Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
		}
		$this->_responseWS->response();
	}

	/**
	 *
	 * @return Response
	 */
	public function store(RegisterPublicationRequest $request) {
		try {
			$dataAds = $request->all();
			$dataAds['user_id'] = $this->_identity->id;
			$dataAds['date_publish'] = date("Y-m-d H:i:s");
			$dataAds['date_expired'] = date("Y-m-d H:i:s");
			if(isset($dataAds['pr_provider_id'])){ 
				if($dataAds['pr_provider_id']==0 ||$dataAds['pr_provider_id']==''){
					unset($dataAds['pr_provider_id']);
				}
			}
			$objAds = PuAds::create($dataAds);
			if (isset($dataAds['picture'])) {
				$file = base64_decode($dataAds['picture']);
				$dataPicture['name_picture'] = date('YmdHis') . rand(1, 1000) . ".jpg";
				$pathrelative = "/dinamic/publication/" . $dataPicture['name_picture'];
				$path = App::publicPath() . $pathrelative;
				file_put_contents($path, $file);
				$dataPicture['url'] = $pathrelative;
				$dataPicture['pu_ad_id'] = $objAds->id;
				PuPicture::create($dataPicture);
			}
			$this->_responseWS->setDataResponse(Response::HTTP_CREATED, ['id' => $objAds->id], [], 'ok');
		} catch (\Exception $exc) {
			dd($exc->getMessage());
			$this->_responseWS->setDataResponse(
					Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
		}
		$this->_responseWS->response();
	}

	/**
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(RegisterPublicationRequest $request, $id) {
		try {
			$this->haveAdsForUser($id);
			$dataAds = $request->all();
			$objAds = PuAds::find($id);
			$objAds->update($dataAds);
			if (isset($dataAds['picture'])) {
				$objPicture = PuPicture::wherePuAdId($id);
				$objPicture->delete();
				$file = base64_decode($dataAds['picture']);
				$dataPicture['name_picture'] = date('YmdHis') . rand(1, 1000) . ".jpg";
				$pathrelative = "/dinamic/publication/" . $dataPicture['name_picture'];
				$path = App::publicPath() . $pathrelative;
				file_put_contents($path, $file);
				$dataPicture['url'] = $pathrelative;
				$dataPicture['pu_ad_id'] = $objAds->id;
				PuPicture::create($dataPicture);
			}
			$this->_responseWS->setDataResponse(Response::HTTP_CREATED, ['id' => $objAds->id], [], 'ok');
		} catch (\Exception $exc) {
			$this->_responseWS->setDataResponse(
					Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
		}
		$this->_responseWS->response();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request, $id) {
		try {
//            $this->haveAdsForUser($id);
			$dataPuCommentsForAds = new PuComments();
			$dataAds = $dataPuCommentsForAds->getAllCommentForAds($id, $request->input('page'));
			$this->_responseWS->setDataResponse(Response::HTTP_OK, $dataAds, array(), 'ok');
		} catch (Exception $exc) {
			$this->_responseWS->setDataResponse(
					Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
		}
		$this->_responseWS->response();
	}

	/**
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		try {
			$request['id'] = $id;
			$v = Validator::make($request, [
						'id' => 'required|exists:pu_ads,id,datedelete,NULL,flagactive,1',
			]);
			if ($v->fails()) {
				$error = (array) json_decode($v->errors());
				$datError = ['element' => 'id', 'msg' => $error['id'][0]];
				$this->_responseWS->setDataResponse(0, [], [$datError], 'publicacion inválida');
			} else {
				$dataAds = PuAds::whereId($id)->whereUserId($this->_identity->id)->whereFlagactive(1)->first();
				if (isset($dataAds->id)) {
					$objAds = PuAds::find($id);
					$objAds->delete();
					$msg = 'ok';
				} else {
					$objComplaints = PuComplaints::whereUserId($this->_identity->id)
							->wherePuAdId($id)
							->first();
					if ($objComplaints == null) {
						PuComplaints::create(['pu_ad_id' => $id, 'user_id' => $this->_identity->id]);
						$msg = 'ok';
					} else {
						$msg = 'Usted ya ha denunciado la publicación';
					}
				}
				$this->_responseWS->setDataResponse(Response::HTTP_OK, [], [], $msg);
			}
		} catch (Exception $exc) {
			$this->_responseWS->setDataResponse(
					Response::HTTP_INTERNAL_SERVER_ERROR, [], [], '');
		}
		$this->_responseWS->response();
	}

	/**
	 * método que permite validar post de Usuario
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function haveAdsForUser($id) {
		$dataAds = PuAds::whereId($id)->whereUserId($this->_identity->id)->whereFlagactive(1)->first();
		if (isset($dataAds->id)) {
			return true;
		} else {
			$this->_responseWS->setDataResponse(
					Response::HTTP_NON_AUTHORITATIVE_INFORMATION, array(), array(), 'id de publicacion no permitida');
			$this->_responseWS->response();
		}
	}

}
