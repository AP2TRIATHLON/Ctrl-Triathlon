<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ErrorController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MiddlewareMaxRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('Content-Length') > 1024*1024) {
            abort(Response::HTTP_REQUEST_ENTITY_TOO_LARGE, 'Request size too large.');
        }
        return $next($request);
    }
}
