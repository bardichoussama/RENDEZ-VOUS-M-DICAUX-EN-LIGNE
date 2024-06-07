<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;


use Illuminate\Http\Request;

class PatientDashboard extends Controller
{
    public function index()
    {

        $today = Carbon::today();
        $patientId = auth()->guard('patient')->id();

        $listTodayAppointments = Appointment::where('patient_id', $patientId)
            ->whereDate('appointment_date', $today)
            ->orderBy('start_time')
            ->get();


        return view('patient.patientDashboard', compact('appointments'));
    }
   
}
