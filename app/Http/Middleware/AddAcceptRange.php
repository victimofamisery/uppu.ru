<?php namespace App\Http\Middleware;

use Closure;

class AddAcceptRange {
     public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Accept-Ranges','bytes');
        $request->header( 'HTTP/1.1 206 Partial Content' );
        return $response;
    }
}