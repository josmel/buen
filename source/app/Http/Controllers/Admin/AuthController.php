<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller {

    protected $loginPath = '/admpanel/auth/login';
    protected $redirectPath = '/admpanel';
    protected $redirectTo = '/';

  
    public function __construct() {
        $this->auth = Auth::admin();
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogout() {
        $this->auth->logout();
        return redirect('/');
    }  
}