<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorAppointments extends Controller
{
   public function index(Request $request)
    {
        $status = $request->query('status');

        // Get the authenticated doctor's id
        $doctorId = auth()->guard('doctor')->id();

        // Retrieve appointments based on the status filter
        if ($status) {
            $appointments = Appointment::where('doctor_id', $doctorId)
                                        ->where('status', $status)
                                        ->with('patient')
                                        ->get();
        } else {
            $appointments = Appointment::where('doctor_id', $doctorId)
                                        ->with('patient')
                                        ->get();
        }

        return view('doctor.doctorApointments', [
            'appointments' => $appointments,
            'status' => $status
        ]);
    }
}
