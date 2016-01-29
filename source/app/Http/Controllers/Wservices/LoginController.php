<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerWS,
	App\Models\User,
	App\Http\Requests\Wservice\LoginRequest,
	JWTAuth,
	Request,
	App\Models\UserHash,
	App\Models\UserCategories,
	Illuminate\Http\Response;

class LoginController extends ControllerWS {

	public function store(LoginRequest $request) {
		try {
			$credentials['password'] = $request->input('idfacebook');
			$credentials['email'] = $request->input('email');
			$data['tokendevice'] = $request->input('tokendevice');
			$data['typedevice'] = $request->input('typedevice');
			$datauser = User::whereEmail($credentials['email'])->get()->first();
			if (isset($datauser)) {
				switch ($datauser->flagactive) {
					case User::STATE_USER_ACTIVE:
						if (!$token = JWTAuth::attempt($credentials)) {
							$this->_responseWS->setDataResponse(Response::HTTP_UNAUTHORIZED, [], array(), ControllerWS::MSG_CUSTOM_USER_PASS_FAIL);
						} else {
							$login = JWTAuth::toUser($token);
							$obj = User::find($login->id);
							$UserCategory = new UserCategories();
							$categories = $UserCategory->UserCategories($login->id);
							$dataUser = $login;
							$dataUser['flagterms'] = $login->flagterms;
							$dataUser['categories'] = $categories->toArray();
							$modelhash = new UserHash();
							$modelhash->GetFriendFacebook($data['tokendevice'],$data['typedevice'],$login->name . ' ' . $login->lastname, $login->picture, $credentials['password'], $login->id);
							$obj->update($data);
							$this->_responseWS->setDataResponse(Response::HTTP_OK, [$dataUser], array(), 'ok');
							$this->_responseWS->setHeader('_token', $token);
						}
						break;
					case User::STATE_USER_INACTIVE:
						$this->_responseWS->setDataResponse(
								Response::HTTP_INTERNAL_SERVER_ERROR, [], [], 'usuario desactivado por el administrador');
						break;
				}
			} else {
				$this->_responseWS->setDataResponse(Response::HTTP_UNAUTHORIZED, [], [], 'no existe el usuario');
			}
		} catch (\Exception $exc) {
			dd($exc->getMessage());
			$this->_responseWS->setDataResponse(
					Response::HTTP_INTERNAL_SERVER_ERROR, [], [], '');
		}
		$this->_responseWS->response();
	}

}
