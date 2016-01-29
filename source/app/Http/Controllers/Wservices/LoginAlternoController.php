<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerWS,
	App\Models\User,
	App\Http\Requests\Wservice\LoginAlternativeRequest,
	JWTAuth,
	App\Models\UserCategories,
	Illuminate\Http\Response,
	App\Models\RoleUser,
	App\Models\UserHash,
	App\Models\Role,
	Hash;

class LoginAlternoController extends ControllerWS {

	public function store(LoginAlternativeRequest $request) {
		try {
			$credentials['password'] = $request->input('idfacebook');
			$credentials['email'] = $request->input('email');
			$data['tokendevice'] = $request->input('tokendevice');
			$data['typedevice'] = $request->input('typedevice');
			$datauser = User::whereEmail($credentials['email'])->get()->first();
			if (isset($datauser)) {
				if ($datauser->flagactive == User::STATE_USER_INACTIVE) {
					$this->_responseWS->setDataResponse(
							Response::HTTP_INTERNAL_SERVER_ERROR, [], [], 'usuario Inactivo');
					$this->_responseWS->response();
				}
			} else {
				$data = $request->all();
				$data['password'] = Hash::make($data['idfacebook']);
				$obj = User::create($data);
				$datosRol = Role::whereName('user_app')->first();
				$daoUserRol['role_id'] = (int) $datosRol->id;
				$daoUserRol['user_id'] = $obj->id;
				RoleUser::create($daoUserRol);
			}
			$this->login($request->all());
		} catch (\Exception $exc) {
			dd($exc->getMessage());
			$this->_responseWS->setDataResponse(
					Response::HTTP_INTERNAL_SERVER_ERROR, [], [], '');
		}
		$this->_responseWS->response();
	}

	public function login($request) {
		$credentials['password'] = $request['idfacebook'];
		$credentials['email'] = $request['email'];
		$data['tokendevice'] = $request['tokendevice'];
		$data['typedevice'] = $request['typedevice'];
		if (!$token = JWTAuth::attempt($credentials)) {
			$this->_responseWS->setDataResponse(Response::HTTP_UNAUTHORIZED, [], array(), ControllerWS::MSG_CUSTOM_USER_PASS_FAIL);
		} else {
			$login = JWTAuth::toUser($token);
			$obj = User::find($login->id);
			//obteniendo las categorias del usuario//
			$UserCategory = new UserCategories();
			$categories = $UserCategory->UserCategories($login->id);
			$dataUser = $login;
			$dataUser['flagterms'] = $login->flagterms;
			$dataUser['categories'] = $categories->toArray();
			$obj->update($data);
			$modelhash = new UserHash();
			$modelhash->GetFriendFacebook($credentials['name']. ' ' . $credentials['lastname'], $credentials['picture'], $credentials['password'], $login->id);
			$this->_responseWS->setDataResponse(Response::HTTP_OK, [$dataUser], array(), 'ok');
			$this->_responseWS->setHeader('_token', $token);
		}
		$this->_responseWS->response();
	}

}
