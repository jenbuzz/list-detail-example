<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($request->getMethod() === 'OPTIONS') {
            $response = response('Preflight OK', 200);

            $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, PATCH, DELETE');
            $response->headers->set('Access-Control-Allow-Headers', 'Origin, Content-Type, X-Auth-Token');
            // $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Max-Age', 86400);

            return $response;
        }

        return $next($request);
    }
}
