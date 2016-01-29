<?php

namespace App\Http\Middleware;

use Auth;
// First copy this file into your middleware directoy
use Closure;

class CheckRole {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct() {
        $this->auth = Auth::admin();
    }

    public function handle($request, Closure $next) {
        $roles = $this->getRequiredRoleForRoute($request->route());
        if ($this->auth->user()->hasRole($roles) || !$roles) {
            return $next($request);
        }
        echo "<script language='JavaScript'>history.back(alert('No tienes acceso para esta pagina'));</script>";exit;
        return response([
            'error' => [
                'codigo' => 'ROL_INSUFICIENTE',
                'descripcion' => 'No tienes acceso para este recurso.'
            ]
                ], 401);
    }

    private function getRequiredRoleForRoute($route) {
       
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }

}
