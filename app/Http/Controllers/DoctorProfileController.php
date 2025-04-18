<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorProfileController extends Controller
{
    public function index()
    {
        $doctorId = auth()->guard('doctor')->id();
        $doctorInfo = Doctor::with(['specialty', 'reviews.patient'])
            ->withCount('reviews') // Include the count of reviews
            ->find($doctorId);

        if ($doctorInfo) {
            return view('doctor.doctorProfile', compact('doctorInfo'));
        } else {
            return redirect()->route('doctorLogin')->with('error', 'Doctor not found.');
        }
    }
    
}






