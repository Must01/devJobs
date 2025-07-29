<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmployerExists
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->employer) {
            return redirect('/')->with('error', 'You need to have an employer profile to access this feature.');
        }

        return $next($request);
    }
}
