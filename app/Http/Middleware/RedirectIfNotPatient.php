<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotPatient
{ public function handle($request, Closure $next)
    {
        if (!Auth::guard('patient')->check()) {
            return redirect()->route('patientLoginView');
        }

        return $next($request);
    }
}
