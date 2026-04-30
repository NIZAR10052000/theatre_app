<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsVerifiedTroupe
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'troupe') {
            if (auth()->user()->is_verified) {
                return $next($request);
            }
            return response()->view('errors.pending-validation');
        }

        return $next($request);
    }
}
