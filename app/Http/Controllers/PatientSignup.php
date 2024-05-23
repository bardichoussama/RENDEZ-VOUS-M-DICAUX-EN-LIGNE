<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PatientSignup extends Controller
{
   public function index(){

    return view('authentication.patient.patientSignup');

   }
   public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|string',
            'password' => 'required|string',
            // Add more validation rules as needed
        ]);
    
        // Create a new Doctor instance with the validated data and save it to the database
        Patient::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']), // Hash the password for security
            // Add more fields as needed
        ]);
    
   
        return redirect()->route('patientLoginView')->with('success', 'Your account has been created successfully.');
    }
}
