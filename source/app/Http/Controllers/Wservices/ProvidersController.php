<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerJWT,
    App\Http\Requests\Wservice\RegisterProviderRequest,
		App\Http\Requests\Wservice\RegisterProviderSearchRequest,
    Illuminate\Http\Response,
    Illuminate\Http\Request,
    App\Models\PrProviders,
    App\Models\PrComments;

class ProvidersController extends ControllerJWT {

    /**
     *
     * @return Response
     */
    public function index(RegisterProviderSearchRequest $request) {
        try {
            $dataProviders = new PrProviders();
            $dataListProviders = $dataProviders->getallProviders($request->input('pu_category_id'),$request->input('name_provider'), $request->input('page'));
            $this->_responseWS->setDataResponse(Response::HTTP_OK, $dataListProviders, array(), 'ok');
        } catch (Exception $exc) { 
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

    /**
     *
     * @return Response
     */
    public function store(RegisterProviderRequest $request) {
        try {
            $dataProvider = $request->all();
            $dataProvider['user_id'] = $this->_identity->id;
            $objProvider = PrProviders::create($dataProvider);
            $this->_responseWS->setDataResponse(Response::HTTP_CREATED, ['id' => $objProvider->id], [], 'ok');
        } catch (\Exception $exc) {
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request,$id) {
        try {
            $dataProvider = new PrComments();
            $objProvider = $dataProvider->getAllCommentForProvider($id,$request->input('page'));
            $this->_responseWS->setDataResponse(Response::HTTP_OK,$objProvider, array(), 'ok');
        } catch (Exception $exc) {
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

}

