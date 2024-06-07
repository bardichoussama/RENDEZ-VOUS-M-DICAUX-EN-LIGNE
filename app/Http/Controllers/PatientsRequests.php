<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PatientsRequests extends Controller
{
    public function index()
    {
        $doctorId = auth()->guard('doctor')->id();

        // dd($doctorId);
        $requestsList = Appointment::with('patient')
            ->where('doctor_id', $doctorId)
            ->where('status', 'pending')
            ->get();
           

        return view('doctor.patientsRequests', compact('requestsList'));
    }

    public function accept(Request $request, $id)
{
    $appointment = Appointment::find($id);
    
    if (!$appointment) {
        return redirect()->back()->with('error', 'Appointment not found.');
    }

    $doctorId = $appointment->doctor_id;
    $appointmentDate = $request->input('appointment_date');
    $startTime = Carbon::parse($request->input('start_time'));
    $duration = $appointment->duration;
    $endTime = $startTime->copy()->addMinutes($duration);

    

    $appointment->appointment_date = $appointmentDate;
    $appointment->start_time = $startTime;
    $appointment->status = 'confirmed';
    $appointment->meeting_link = $request->input('meetingLink');
    
    $appointment->save();

    return redirect()->back()->with('success', 'Appointment accepted successfully.');
}

    public function reject(Request $request,$id)
    {
        $appointment = Appointment::find($id);
     
        if ($appointment) {
            $appointment->status = 'cancelled';
            $appointment->reject_reason = $request->input('rejectMessage');
            $appointment->save();
            // $appointment->delete();

            return redirect()->back()->with('success', 'Appointment rejected successfully.');
        }
        return redirect()->back()->with('error', 'Appointment not found.');
    }
}
