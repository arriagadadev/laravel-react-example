<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $userType)
    {
        if (! $request->user()->hasUserType($userType)) {
            return abort(403, "You don't have authorization to access this content.");
        }
        return $next($request);
    }
}
