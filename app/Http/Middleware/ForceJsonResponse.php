<?php

namespace App\Http\Middleware;

use Closure;

// reference: force json
// https://stackoverflow.com/questions/36366727/how-do-you-force-a-json-response-on-every-response-in-laravel


class ForceJsonResponse
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
        $request->headers->set('Accept', 'application/json');
        return $next($request);
    }
}
