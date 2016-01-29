<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerJWT,
    Illuminate\Http\Response,
    Illuminate\Http\Request,
    App\Models\PuAds;

class PublicationForUserController extends ControllerJWT {

    /**
     *
     * @return Response
     */
    public function index(Request $request) {
        try {

            $dataAdsForUser = new PuAds();
            $dataAds = $dataAdsForUser->getAllAdsForUser($this->_identity->id, $request->input('page'));
            $this->_responseWS->setDataResponse(Response::HTTP_OK, $dataAds->toArray(), array(), 'ok');
        } catch (Exception $exc) {
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

}
