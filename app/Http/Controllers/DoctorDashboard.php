<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;

class DoctorDashboard extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $doctorId = auth()->guard('doctor')->id();
        $todayConsultationsCount = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'completed')
            ->whereDate('appointment_date', $today)
            ->count();

            

        $appointments = Appointment::with('patient')
            ->where('doctor_id', $doctorId)
            ->where('status', 'confirmed')
            ->whereDate('appointment_date', $today)
            ->orderBy('start_time')
            ->get();

        return view('doctor.doctorDashboard', compact('todayConsultationsCount', 'appointments'));
    }


    public function getGenderCounts()
    {
        $doctorId = auth()->guard('doctor')->id();

        $maleCount = Appointment::join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->where('appointments.doctor_id', $doctorId)
            ->where('patients.gender', 'MALE')
            ->count();

        $femaleCount = Appointment::join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->where('appointments.doctor_id', $doctorId)
            ->where('patients.gender', 'FEMALE')
            ->count();

        return response()->json([
            'male' => $maleCount,
            'female' => $femaleCount
        ]);
    }
}
