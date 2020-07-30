<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class ClientCacheMiddleware
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
        if ($etag = $request->header('If-None-Match')) {
            if (Cache::get($etag)) {
                return response(null, 304);
            }
        }

        return $next($request);
    }
}
