<?php

namespace App\Http\Controllers\Wservice;

use App\Http\Controllers\ControllerJWT,
    App\Models\User,
    App\Http\Requests\Wservice\UpdateUserRequest,
    Illuminate\Http\Request,
    Illuminate\Http\Response,
    App\Models\UserCategories,
    App,
    PhpSpec\Exception\Exception;

class UserController extends ControllerJWT {

    function index(Request $request) {
        $id = $this->_identity->id;
        try {
            $UserCategory = new UserCategories();
            $user = User::find($id);
//            $user->picture = $request->root() . $user->picture;
            $categories = $UserCategory->UserCategories($id);
            $data = $user->toarray();
            $data['categories'] = $categories->toArray();
            if (isset($user)) {
                $this->_responseWS->setDataResponse(Response::HTTP_CREATED, [$data], array(), 'ok');
            } else {
                $this->_responseWS->setDataResponse(Response::HTTP_CREATED, [], array(), 'usuario inexistente');
            }
        } catch (\Exception $exc) {
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }


    public function update(UpdateUserRequest $request, $id) {
        try {
            $data = $request->all();
            $user = User::find($this->_identity->id);

//            if (isset($data['picture'])) {
//                $file = base64_decode($data['picture']);
//                $pathrelative = "/dinamic/user/" . date('YmdHis') . rand(1, 1000) . ".jpg";
//                $path = App::publicPath() . $pathrelative;
//                file_put_contents($path, $file);
//                $data['picture'] = $pathrelative;
//            }
            $user->fill($data);
            $user->save();
            $this->_responseWS->setDataResponse(Response::HTTP_OK, [['id' => $user->id]], array(), 'ok');
        } catch (Exception $exc) {
            $this->_responseWS->setDataResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR, array(), array(), '');
        }
        $this->_responseWS->response();
    }

}
