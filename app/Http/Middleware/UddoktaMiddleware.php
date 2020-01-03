<?php

namespace App\Http\Middleware;

use Closure;

class UddoktaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->getUser()->type !== "uddokta") {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
