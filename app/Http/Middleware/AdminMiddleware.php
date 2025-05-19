<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user belum login atau bukan admin, abort atau redirect
        if (! $request->user() || $request->user()->role !== 'admin') {
            abort(403); // atau redirect('/home');
        }
        return $next($request);
    }
}
