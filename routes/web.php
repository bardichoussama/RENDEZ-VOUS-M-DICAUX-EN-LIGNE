<?php

use App\Http\Controllers\ChoicePage;
use App\Http\Controllers\Doctor;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorHome;
use App\Http\Controllers\DoctorLogin;
use App\Http\Controllers\DoctorProfile;
use App\Http\Controllers\DoctorSignup;
use App\Http\Controllers\PatientLogin;
use App\Http\Controllers\PatientProfile;
use App\Http\Controllers\PatientSignup;
use App\Http\Controllers\PatientsRequests;
use Illuminate\Support\Facades\Route;


Route::get('/choicePage', [ChoicePage::class,'index'])->name('choicePage');

// Doctor Routes
Route::get('/', [DoctorHome::class, 'index'])->name('doctorHomePage');
Route::get('/patientsRequests',[PatientsRequests::class,'index'])->name('patientsRequests');
Route::get('/doctorProfile', [DoctorProfile::class, 'index'])->name('doctorProfileView');
Route::get('/doctorSignup', [DoctorSignup::class, 'index'])->name('doctorSignupView');
Route::post('/doctorSignup', [DoctorSignup::class, 'store'])->name('doctorSignup');
Route::get('/doctorLogin', [DoctorLogin::class, 'index'])->name('doctorLoginView');
Route::post('/doctorLogin', [DoctorLogin::class, 'authenticate'])->name('doctorAuthenticate');
Route::get('/doctorLogout', [DoctorLogin::class, 'logout'])->name('doctorLogout');


// Patient Routes
Route::get('/patientHomePage', [DoctorProfile::class, 'index'])->name('patientHomePag');
Route::get('/patientDoctorsList', [DoctorController::class, 'DoctorsList'])->name('patientDoctorsList');
Route::post('/patient-DoctorsList/{doctorId}', [DoctorController::class, 'requestAppointments'])->name('requestAppointment');

Route::get('/patientProfile', [PatientProfile::class, 'index'])->name('patientProfileView');
Route::get('/patientSignup', [PatientSignup::class, 'index'])->name('patientSignupView');
Route::post('/patientSignup', [PatientSignup::class, 'store'])->name('patientSignup');
Route::get('/patientLogin', [PatientLogin::class, 'index'])->name('patientLoginView');
Route::post('/patientLogin', [PatientLogin::class, 'authenticate'])->name('patientLoginAuth');
Route::get('/patientLogout', [PatientLogin::class, 'logout'])->name('patientLogout');












