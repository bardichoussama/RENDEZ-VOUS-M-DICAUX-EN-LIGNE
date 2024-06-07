<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotDoctor
{
   
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('doctor')->check()) {
            return redirect()->route('doctorLoginView');
        }

        return $next($request);
    }
}
