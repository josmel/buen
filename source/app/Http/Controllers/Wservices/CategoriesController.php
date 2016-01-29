<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerJWT,
    App\Models\Categories,
    App\Models\UserCategories,
    Illuminate\Http\Response,
        DB,
    App\Http\Requests\Wservice\RegisterUserCategoriesRequest;

class CategoriesController extends ControllerJWT {

    public function index() {
        try {
            $dataCategory = new Categories();
            $dataListcategories = $dataCategory->allcategories();
            $this->_responseWS->setDataResponse(Response::HTTP_OK, $dataListcategories->toArray(), array(), 'ok');
        } catch (Exception $exc) {
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

    public function store(RegisterUserCategoriesRequest $request) {
        try {
            $idcategories = $request->input('categories_id');
            $idCategory = explode("-", $idcategories);
            foreach ($idCategory as $value) {
                $data['users_id'] = (int) $this->_identity->id;
                $data['pu_categories_id'] = (int) $value;
                UserCategories::create($data);
            }
            $this->_responseWS->setDataResponse(Response::HTTP_CREATED, [], [], 'ok');
        } catch (\Exception $exc) {
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

    public function update(RegisterUserCategoriesRequest $request, $id) {
        try {
            $idcategories = $request->input('categories_id');
            $idCategory = explode("-", $idcategories);
            UserCategories::whereUsersId($this->_identity->id)->delete();
            foreach ($idCategory as $value) {
                $data['users_id'] = (int) $this->_identity->id;
                $data['pu_categories_id'] = (int) $value;
                UserCategories::create($data);
            }
            $this->_responseWS->setDataResponse(Response::HTTP_OK, [], [], 'ok');
        } catch (\Exception $exc) {
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

    function show($id) {
        try {
            $category = Categories::select('pu_categories.*', DB::raw('CONCAT("' . asset('') . '", picture) AS picture'))
                    ->whereId($id)->first();
            if (isset($category)) {
                $this->_responseWS->setDataResponse(Response::HTTP_OK, [$category->toArray()], array(), 'ok');
            } else {
                $this->_responseWS->setDataResponse(Response::HTTP_OK, [], array(), '');
            }
        } catch (\Exception $exc) {
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

}
