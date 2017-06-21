<?php

namespace App\Http\Middleware;

use Closure;

class ForceHttps {

    public function handle($request, Closure $next)
    {
        if ($request->server('HTTP_X_FORWARDED_PORT') == '80' && config('app.forceHttps')) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request); 
    }
}