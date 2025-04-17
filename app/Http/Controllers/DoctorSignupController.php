<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor; // Assuming Doctor model exists

class DoctorSignupController extends Controller
{
    public function index()
    {
        return view('authentication.doctor.doctorSignup');
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
        Doctor::create([
            'first_name' => $validatedData['firstname'],
            'last_name' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']), // Hash the password for security
            // Add more fields as needed
        ]);
    
   
        return redirect()->route('doctorLoginView')->with('success', 'Your account has been created successfully.');
    }
    
}
