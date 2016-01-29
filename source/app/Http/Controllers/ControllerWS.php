<?php

namespace App\Http\Controllers;

use App\Services\ResponseWService;

abstract class ControllerWS extends Controller {

    const MSG_CUSTOM_USER_PASS_FAIL = 'Usuario o Contraseña incorrecta';

    protected $_responseWS;

    public function __construct() {
        $this->middleware('guest');
//            $this->middleware('jwt.auth', ['except' => ['authenticate']]);
        $this->_responseWS = new ResponseWService();
    }

    public function __call($name, $arguments) {
        $this->_responseWS->setDataResponse(ResponseWService::HEADER_HTTP_RESPONSE_METODO_NO_PERMITIDO);
        $this->_responseWS->response();
    }

    public function expired($e) {
        $token = \JWTAuth::parseToken();

        Config::package('tymon/jwt-auth', 'jwt');
        $ttl = Config::get('jwt::refresh_ttl');

        $iat = Carbon::createFromTimestamp($token->getPayload()->get('iat'));
        $now = Carbon::now();

        // if renew ttl is expired too, return 401, otherwise let
        // the application generate a new token to frontend
        if ($iat->diffInMinutes($now) >= $ttl) {
            unset($iat, $now, $ttl);
            return response_failure(
                    Lang::get('errors.api.auth.expired'), Config::get('status.error.unauthorized')
            );
        }

        unset($iat, $now, $ttl);
    }

}
