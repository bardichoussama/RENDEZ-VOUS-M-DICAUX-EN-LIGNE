<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorLogin extends Controller
{
    public function index()
    {
        return view('authentication.doctor.doctorLogin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('doctor')->attempt($credentials)) {
            $request->session()->regenerate();
            // Authentication successful, redirect to doctor profile
            return redirect()->route('doctorProfileView');
        }

        // Authentication failed, redirect back with error message
        return redirect()->route('doctorLoginView')->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('doctorLoginView')->with('success', 'You are logged out.');
    }
}
