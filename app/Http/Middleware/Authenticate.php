<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Check if the request expects JSON
        if ($request->expectsJson()) {
            return null;
        }

        // Redirect based on the guard
        if ($request->is('doctor*')) {
            return route('doctorLoginView');
        }

        if ($request->is('patient*')) {
            return route('patientLoginView');
        }

        // Default redirect to a common login page or a homepage
        return route('homePage'); // Change to your home page or a default route
    }
}
