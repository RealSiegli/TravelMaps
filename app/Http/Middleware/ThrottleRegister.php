<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class ThrottleRegister
{
    public function handle($request, Closure $next)
    {
        $executed = RateLimiter::attempt(
            'register:'.$request->ip(),
            $perDay = 3,
            function() {
                // This closure is executed if the limit is not exceeded
            }
        );

        if (! $executed) {
            return response('Too Many Attempts.', Response::HTTP_TOO_MANY_REQUESTS);
        }

        return $next($request);
    }
}