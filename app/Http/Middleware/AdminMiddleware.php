<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(! Auth::user()->is_admin) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthenticated. You are not an admin.'], 401);
            }

            abort(403, "You're not admin, you don't have the permission.");
        }

        return $next($request);
    }
}
