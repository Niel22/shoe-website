<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminDevice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminAgent  = $request->header('User-Agent');

        if(preg_match('/Mobile|Android|iphone|ipad|ipod/i', $adminAgent)){
            return abort(403, "Access to admin dashboard is Limited to Laptop only.");
        }
        return $next($request);
    }
}
