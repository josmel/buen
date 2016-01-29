<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerJWT,
    App\Http\Requests\Wservice\RegisterLikePublicationRequest,
    Illuminate\Http\Response,
    App\Models\PuLikes;

class LikePublicationController extends ControllerJWT {

    /**
     *
     * @return Response
     */
    public function store(RegisterLikePublicationRequest $request) {
             try {
            $dataLike = $request->all();
            $objLike = PuLikes::whereUserId($this->_identity->id)
                    ->wherePuAdId($dataLike['pu_ad_id'])
                    ->first();
            if ($objLike == null) {
                $dataLike['user_id'] = $this->_identity->id;
                $objLike = PuLikes::create($dataLike);
                $msg = 'ok';
            } else {
                $msg = 'Usted ya le ha dado Like a la publicación';
            }
            $this->_responseWS->setDataResponse(Response::HTTP_OK, ['id' => $objLike->id], [], $msg);
        } catch (\Exception $exc) {
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, [], [], '');
        }
        $this->_responseWS->response();
    }

}
