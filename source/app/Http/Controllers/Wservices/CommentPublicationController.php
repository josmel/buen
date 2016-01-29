<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerJWT,
    App\Http\Requests\Wservice\RegisterCommentPublicationRequest,
    Illuminate\Http\Response,
    App\Models\PuComments,
	App\Http\Controllers\RequestNotification,
    App;

class CommentPublicationController extends ControllerJWT {

    /**
     *
     * @return Response
     */
    public function store(RegisterCommentPublicationRequest $request) {
        try {
            $dataPublication = $request->all();
            $dataPublication['user_id'] = $this->_identity->id;
            if (isset($dataPublication['picture'])) {
                $file = base64_decode($dataPublication['picture']);
                $pathrelative = "/dinamic/pu_comment/" . date('YmdHis') . rand(1, 1000) . ".jpg";
                $path = App::publicPath() . $pathrelative;
                file_put_contents($path, $file);
                $dataPublication['picture'] = $pathrelative;
            }
            $objPublication = PuComments::create($dataPublication);
			$Notification= new RequestNotification();
			$Notification->setNotification($this->_identity->id,$dataPublication['pu_ad_id'],RequestNotification::COMMMENT);
            $this->_responseWS->setDataResponse(Response::HTTP_OK, ['id' => $objPublication->id], [], 'ok');
        } catch (\Exception $exc) {
            dd($exc->getMessage());
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, [], [], '');
        }
        $this->_responseWS->response();
    }

}
