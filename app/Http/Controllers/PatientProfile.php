<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientProfile extends Controller
{
   
    public function index()
    {
       
        $doctorId = auth()->id();

            return view('patient.patientProfile');
      
    }
}
