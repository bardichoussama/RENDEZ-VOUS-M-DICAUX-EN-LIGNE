<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorAppointments extends Controller
{
   public function index(){
    return view('doctor.doctorApointments');
   }
}
