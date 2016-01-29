<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AuthenticateOnceWithBasicAuth {

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
        return $this->auth->onceBasic() ? : $next($request);
    }

}
