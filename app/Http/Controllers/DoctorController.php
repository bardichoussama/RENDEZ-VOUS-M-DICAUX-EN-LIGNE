<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialty;

class DoctorController extends Controller
{
    public function allDoctors()
    {
        $getAlldoctors =  Doctor::whereNotNull('specialty_id')->count();
        $getAllSpecialties = Specialty::withCount('doctors')->get();
        
        
        return view('patient.patientDoctorsList', compact('getAllSpecialties','getAlldoctors'));   
    }
}
