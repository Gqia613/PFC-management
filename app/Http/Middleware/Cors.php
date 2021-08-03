<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', 'http://localhost:8080')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, DELETE, PUT')
            ->header('Access-Control-Allow-Headers', 'Accept, X-Requested-With, Origin, Content-Type, x-csrf-token, x-xsrf-token');
    }
}