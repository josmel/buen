<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerJWT,
    App\Http\Requests\Wservice\RegisterCommentProviderRequest,
    Illuminate\Http\Response,
		DB,
    App\Models\PrComments,
         App;

class CommentProviderController extends ControllerJWT {

    /**
     *
     * @return Response
     */
    public function store(RegisterCommentProviderRequest $request) {
        try {
            $dataProvider = $request->all();
            $objProvider = PrComments::whereUserId($this->_identity->id)
                    ->wherePrProviderId($dataProvider['pr_provider_id'])
                    ->first();
            if ($objProvider == null) {
                $dataProvider['user_id'] = $this->_identity->id;
                if (isset($dataProvider['picture'])) {
                    $file = base64_decode($dataProvider['picture']);
                    $pathrelative = "/dinamic/pr_comment/" . date('YmdHis') . rand(1, 1000) . ".jpg";
                    $path = App::publicPath() . $pathrelative;
                    file_put_contents($path, $file);
                    $dataProvider['picture'] = $pathrelative;
                }
                $objProvider = PrComments::create($dataProvider);
				 DB::select("call score_provider(" . $dataProvider['pr_provider_id'] . "," . $dataProvider['punctuation'] . ")");
                $msg = 'ok';
            } else {
                $msg = 'Usted ya ha valorado al proveedor';
            }
            $this->_responseWS->setDataResponse(Response::HTTP_OK, ['id' => $objProvider->id], [], $msg);
        } catch (\Exception $exc) {
            dd($exc->getMessage());
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, [], [], '');
        }
        $this->_responseWS->response();
    }

}
