<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Config;

class Authenticate {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct() {
        $this->auth = Auth::admin();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if ($this->auth->guest()) {
            $authorize = $this->isPublicRequest($request);

            if (!$authorize) {
                if ($request->ajax()) {
                    return response('Unauthorized.', 401);
                } else {
                    return redirect()->guest(route('login'));
                }
            }
        }

        return $next($request);
    }

    private function isPublicRequest($request) {
        $authorize = false;
        foreach (Config::get('auth.url_public') as $value) {
            if ($request->is($value)) {
                $authorize = true;
                break;
            }
        }
        return $authorize;
    }

}
