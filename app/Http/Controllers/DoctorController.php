<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Support\Facades\Session;

class DoctorController extends Controller
{

    public function DoctorsList()
    {
        $totalDoctors = Doctor::whereNotNull('specialty_id')->count();
        $specialties = Specialty::withCount('doctors')->get();


        $doctors = Doctor::with(['completedAppointments', 'specialty'])
            ->withCount('completedAppointments as nbAppointments')
            ->get();
        $pid = Auth()->guard('patient')->id();
        return view('patient.patientDoctorsList', compact('specialties', 'totalDoctors', 'doctors', 'pid'));
    }

    public function requestAppointments(Request $request, $doctorId)
    {
        define('SLOT_DURATION', 30);
    
        $validatedData = $request->validate([
            'appMessage' => 'required|string|max:255',
            'duration' => 'required|integer|min:30',
            'startTime' => 'required|date_format:H:i',
            'endTime' => 'required|date_format:H:i|after:startTime',
        ]);
    
        if ($validatedData['duration'] % SLOT_DURATION !== 0) {
            return back()->withErrors(['duration' => 'The duration must be in increments of 30 minutes.']);
        }
    
        $doctor = Doctor::find($doctorId);
    
        if (!$doctor) {
            return redirect()->back()->with('error', 'Doctor not found.');
        }
    
        $totalSlots = $validatedData['duration'] / SLOT_DURATION;
        $totalPrice = $doctor->consultation_price * $totalSlots;
    
        // Create a new appointment      
        $requestAppointments = new Appointment();
        $requestAppointments->doctor_id = $doctor->id;
        $requestAppointments->patient_id = auth()->guard('patient')->id();
        $requestAppointments->requested_date = now();
        $requestAppointments->message = $validatedData['appMessage'];
        $requestAppointments->message = $validatedData['appMessage'];
        $requestAppointments->duration = $validatedData['duration']; 
        $requestAppointments->price = $totalPrice;
        $requestAppointments->status = 'pending';
        $requestAppointments->save();
    
        return redirect()->back()->with('success', 'Appointment request sent successfully.');
    }
    
    
}
