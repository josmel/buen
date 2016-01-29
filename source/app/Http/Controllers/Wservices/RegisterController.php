<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerWS,
    App\Models\User,
    App\Models\RoleUser,
    App\Models\Role,
    App\Http\Requests\Wservice\RegisterUserRequest,
    Illuminate\Http\Response,
    Hash;

class RegisterController extends ControllerWS {

    public function store(RegisterUserRequest $request) {
        try {
            $data = $request->all();
            $data['password'] = Hash::make($data['idfacebook']);
            $obj = User::create($data);
            $datosRol = Role::whereName('user_app')->first();
            $daoUserRol['role_id'] = (int) $datosRol->id;
            $daoUserRol['user_id'] = $obj->id;
            RoleUser::create($daoUserRol);
            $this->_responseWS->setDataResponse(Response::HTTP_CREATED, [['id' => $obj->id]], [], 'ok');
        } catch (\Exception $exc) {
            dd($exc->getMessage());
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

    function show($id) {
        try {
            $user = User::find($id, ['email', 'datecreate']);
            if (isset($user)) {
                $this->_responseWS->setDataResponse(Response::HTTP_CREATED, [['id' => $user->id, 'email' => $user->email]], array(), 'WS_M_3');
            } else {
                $this->_responseWS->setDataResponse(Response::HTTP_CREATED, [], array(), 'WS_M_4');
            }
        } catch (\Exception $exc) {
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

}
