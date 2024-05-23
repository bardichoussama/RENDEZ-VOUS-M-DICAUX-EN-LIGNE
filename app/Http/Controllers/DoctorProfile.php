<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorProfile extends Controller
{
    public function index()
    {

        $doctorId = auth()->guard('doctor')->id();
        $doctorInfo = Doctor::with('specialty')->find($doctorId);
    
        
        if ($doctorInfo) {
            return view('doctor.doctorProfile', compact('doctorInfo'));
        } else {
            return redirect()->route('doctorLogin')->with('error', 'Doctor not found.');
        }
    }
    
    

}






