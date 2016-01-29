<?php

//

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerJWT,
	Illuminate\Http\Request,
	App\Models\UserHash,
	App\Models\UserFriends,
	Illuminate\Http\Response;

class FriendsController extends ControllerJWT {

	public function store(Request $request) {
		try {
			$UserHash = UserHash::whereIduser($this->_identity->id)->first();
			$data_friends = $request->input('data_friends');
			$dataFriends = get_object_vars(json_decode($data_friends));
			$modelFriends = new UserFriends();
			foreach ($dataFriends['data'] as $value) {
				$UserName = UserHash::whereFullname($value->name)->first();
				$Url = UserHash::wherePicture($value->picture->data->url)->first();
				if ($UserName && !$Url) {
					$modelHash = UserHash::find($UserName->id);
					$modelHash->update(['picture' => $value->picture->data->url]);
					$idFriens = $modelHash->id;
				} elseif (!$UserName && $Url) {
					$modelHash = UserHash::find($Url->id);
					$modelHash->update(['fullname' => $value->name]);
					$idFriens = $modelHash->id;
				} elseif (!$UserName && !$Url) {
					$lastIdHash = UserHash::create([
								'picture' => $value->picture->data->url,
								'fullname' => $value->name
							])->id;
					$idFriens = $lastIdHash;
				} else {
					$idFriens = $UserName->id;
				}
				$modelFriends->insertFriends($UserHash->id, $idFriens);


//				$UserHash = UserHash::whereUserId($this->_identity->id)->first();
//			$data_friends = $request->input('data_friends');
//			$dataFriends = get_object_vars(json_decode($data_friends));
//			$modelFriends = new UserFriends();
//			foreach ($dataFriends['data'] as $value) {
//				$UserName = UserHash::whereName($value->name)->first();
//				$Url = UserHash::whereUrl($value->picture->data->url)->first();
//				if ($UserName && !$Url) {
//					$modelHash = UserHash::find($UserName->id);
//					$modelHash->update(['url' => $value->picture->data->url]);
//					$idFriens = $modelHash->id;
//				} elseif (!$UserName && $Url) {
//					$modelHash = UserHash::find($Url->id);
//					$modelHash->update(['name' => $value->name]);
//					$idFriens = $modelHash->id;
//				} elseif (!$UserName && !$Url) {
//					$dataHash = UserHash::create([
//								'url' => $value->picture->data->url,
//								'name' => $value->name
//					]);
//					$idFriens = $dataHash->id;
//				}else{
//					$idFriens = $UserName->id;
//				}
//				$modelFriends->insertFriends($UserHash->id, $idFriens);
			}
			$this->_responseWS->setDataResponse(Response::HTTP_OK, [], [], 'ok');
		} catch (\Exception $exc) {
			dd($exc->getMessage());
			$this->_responseWS->setDataResponse(
					Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
		}
		$this->_responseWS->response();
	}

}
