<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerJWT,
 JWTAuth,
 Illuminate\Http\Response;

class LogoutController extends ControllerJWT {

    public function index() {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            $this->_responseWS->setDataResponse(Response::HTTP_CREATED, [], [], 'ok');
        } catch (\Exception $exc) {
            $this->_responseWS->setDataResponse(Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

}
