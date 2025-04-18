<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorLoginController extends Controller
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
            return redirect()->route('doctorProfileView');
        }

     
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
