<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class PatientAppointment extends Controller
{

    
    public function index(Request $request)
    {
        $status = $request->input('status');
        $patientId = auth()->guard('patient')->id();
        $query = Appointment::where('patient_id', $patientId);
    
        if ($status) {
            $query->where('status', $status);
        }
    
        $appointments = $query->with('doctor')->orderBy('appointment_date')->get();
    
        return view('patient.patientApointments', compact('appointments', 'status'));
    }
}
