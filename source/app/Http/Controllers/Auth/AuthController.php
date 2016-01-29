<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller,
   App\Http\Requests\Auth\LoginRequest,
   Illuminate\Http\Request,
   Illuminate\Http\Response,
   Auth,
   Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

   use AuthenticatesAndRegistersUsers;

   protected $loginPath = '/login';
   protected $redirectPath = '/admpanel';
   protected $redirectTo = '/';

   public function __construct() {
       $this->auth = Auth::admin();
       $this->middleware('guest', ['except' => 'getLogout']);
   }

   public function getLogin() {
       return $this->renderView('auth.login');
   }

   public function postLogin(LoginRequest $request) {
       $credentials = $request->only('email', 'password');
       if ($this->auth->attempt($credentials, $request->has('remember'))) {
           return array(
               'state' => 1,
               'msg' => 'ok',
               'data' => array(
                   'redirect' => $this->redirectPath()
               ),
               'data_error' => array(),
           );
       }
       return array(
           'state' => 0,
           'msg' => 'no login',
           'data_error' => array(
               'email' => $this->getFailedLoginMessage(),
           ),
       );
   }

   public function postLogin2(LoginRequest $request) {
       $credentials = $request->only('email', 'password');
       if ($this->auth->attempt($credentials, $request->has('remember'))) {
           return redirect()->intended($this->redirectPath());
       }
       return redirect($this->loginPath())
                       ->withInput($request->only('email', 'remember'))
                       ->withErrors([
                           'email' => $this->getFailedLoginMessage(),
       ]);
   }

   protected function getFailedLoginMessage() {
       return 'Estas credenciales no coinciden con nuestros registros.';
   }

}