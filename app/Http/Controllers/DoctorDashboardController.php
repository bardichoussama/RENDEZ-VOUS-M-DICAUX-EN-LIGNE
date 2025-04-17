<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class DoctorDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $doctorId = auth()->guard('doctor')->id();

        $todayApplicationCount = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'completed')
            ->whereDate('appointment_date', $today)
            ->count();

        $totalConsultationsCount = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'completed')
            ->count();

            $totalPatients = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'completed')
            ->distinct('patient_id')
            ->count('patient_id');

        $pendingAppointment = Appointment::with('patient')
            ->where('doctor_id', $doctorId)
            ->where('status', 'pending')
            ->count();

        $todayConsultationsList = Appointment::with('patient')
            ->where('doctor_id', $doctorId)
            ->where('status', 'confirmed')
            ->whereDate('appointment_date', $today)
            ->orderBy('start_time')
            ->get();

        return view('doctor.doctorDashboard', compact('todayApplicationCount', 'totalConsultationsCount','pendingAppointment','todayConsultationsList','totalPatients'));
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

    public function complete(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {
            $appointment->status = 'completed';
            $appointment->save();

            return redirect()->back()->with('success', 'Appointment marked as completed.');
        }

        return redirect()->back()->with('error', 'Appointment not found.');
    }
}
