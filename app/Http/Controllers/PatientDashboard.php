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
            ->where('status', 'confirmed')
            ->orderBy('start_time')
            ->get();


           $pendingAppointments  =Appointment::where('patient_id', $patientId)
           ->where('status','pending')
           ->count();

           $rejectedAppointments  =Appointment::where('patient_id', $patientId)
           ->where('status','cancelled')
           ->count();

           $consultationTotal  =Appointment::where('patient_id', $patientId)
           ->where('status','completed')
           ->count();

       


        return view('patient.patientDashboard', compact('listTodayAppointments','pendingAppointments','consultationTotal','rejectedAppointments'));
    }
   
}
