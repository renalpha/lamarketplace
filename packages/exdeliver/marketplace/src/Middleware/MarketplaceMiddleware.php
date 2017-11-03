<?php

namespace Exdeliver\Marketplace\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class MarketplaceMiddleware
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
     * @return void
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
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                $previous_url = url()->current();
                $previous_url = (isset($previous_url) && $previous_url != '' && $previous_url != '/admin/login') ? '?previous-url=' . $previous_url : null;
                return redirect()->to('/admin/login' . $previous_url);
            }
        }

        return $next($request);
    }
}
