<?php

namespace App\Http\Middleware;

use App, Closure, Session, View;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class AdminAuthorize
 * @package Belt\Core\Http\Middleware
 */
class AdminAuthorize
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {

            if ($route = $request->route()) {
                if ($middleware = $route->middleware()) {
                    if (in_array('api', $middleware)) {
                        return response('Unauthorized.', 401);
                    }
                }
            }

            Session::put('_redirect', $request->fullUrl());
            Session::flash('warning', 'You must be logged in to access that URL.');
            return redirect()->guest('/');
        }

        return $next($request);
    }

}
