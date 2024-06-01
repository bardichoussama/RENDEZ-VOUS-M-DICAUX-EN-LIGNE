<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PatientLogin extends Controller
{
    public function index()
    {
        return view('authentication.patient.patientLogin');
    }

    public function authenticate(Request $request)
    {
     
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

    
        if (Auth::guard('patient')->attempt($credentials)) {
            $request->session()->regenerate();       
            return redirect()->route('patientProfileView')->with('success', 'Logged in successfully.');
        }else{
            
        return redirect()->route('patientLoginView')->with('error', 'Invalid email or password.');
            
        }

     
    }

    public function logout(Request $request)
    {
        Auth::guard('patient')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('patientLoginView')->with('success', 'You are deconnected.');
    }
}
