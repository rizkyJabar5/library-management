<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Log;
use Symfony\Component\HttpFoundation\Response;

class VerifyIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && Auth::user()->isAdmin()) {
            Log::info('User is admin', ['user_id' => Auth::id()]);
            return $next($request);
        }
        Log::info('User is student', ['user_id' => Auth::id()]);

        return redirect('/student');
    }
}
