<?php

use App\Http\Controllers\ChoicePage;
use App\Http\Controllers\Doctor;
use App\Http\Controllers\DoctorAppointments;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorDashboard;
use App\Http\Controllers\DoctorHome;
use App\Http\Controllers\DoctorLogin;
use App\Http\Controllers\DoctorProfile;
use App\Http\Controllers\DoctorSettings;
use App\Http\Controllers\DoctorSignup;
use App\Http\Controllers\PatientLogin;
use App\Http\Controllers\PatientProfile;
use App\Http\Controllers\PatientSettings;
use App\Http\Controllers\PatientSignup;
use App\Http\Controllers\PatientsRequests;
use Illuminate\Support\Facades\Route;


Route::get('/choicePage', [ChoicePage::class, 'index'])->name('choicePage');

// Doctor Routes
Route::get('/', [DoctorHome::class, 'index'])->name('doctorHomePage');

Route::get('/doctorDashboard', [DoctorDashboard::class, 'index'])->name('doctorDashboardView');
Route::get('/api/gender-counts', [DoctorDashboard::class, 'getGenderCounts']);
Route::get('/doctor/todays-appointments', [DoctorDashboard::class, 'getTodaysAppointments'])->name('doctor.todaysAppointments');

Route::get('/doctorAppointments', [DoctorAppointments::class, 'index'])->name('listAppointments');
Route::get('/patientsRequests', [PatientsRequests::class, 'index'])->name('patientsRequests');
Route::post('/edit-Appointments/{id}', [PatientsRequests::class, 'accept'])->name('editAppointments');
Route::put('/drop-Appointments/{appId}', [PatientsRequests::class, 'reject'])->name('rejectAppointments');
Route::get('/doctorProfile', [DoctorProfile::class, 'index'])->name('doctorProfileView');

//doctor settings
Route::get('/doctorSettings', [DoctorSettings::class, 'index'])->name('doctorSettingsView');
Route::put('/doctor/{doctorId}/profile-photo', [DoctorSettings::class, 'updateProfilePhoto'])->name('doctorProfilePhoto');
Route::put('/doctor/{doctorId}/social-accounts', [DoctorSettings::class, 'updateSocialAccounts'])->name('doctorSocialAccounts');
Route::put('/doctor/{doctorId}/general-info', [DoctorSettings::class, 'updateGeneralInfo'])->name('doctorGeneralInfo');
Route::put('/doctor/{doctorId}/update-password', [DoctorSettings::class, 'updatePassword'])->name('doctorPasswordUpdate');


//doctor Auth
Route::get('/doctorSignup', [DoctorSignup::class, 'index'])->name('doctorSignupView');
Route::post('/doctorSignup', [DoctorSignup::class, 'store'])->name('doctorSignup');
Route::get('/doctorLogin', [DoctorLogin::class, 'index'])->name('doctorLoginView');
Route::post('/doctorLogin', [DoctorLogin::class, 'authenticate'])->name('doctorAuthenticate');
Route::get('/doctorLogout', [DoctorLogin::class, 'logout'])->name('doctorLogout');


// Patient Routes
Route::get('/patientHomePage', [DoctorProfile::class, 'index'])->name('patientHomePag');
Route::get('/patientDoctorsList', [DoctorController::class, 'DoctorsList'])->name('patientDoctorsList');
Route::post('/patient-DoctorsList/{doctorId}', [DoctorController::class, 'requestAppointments'])->name('requestAppointment');


//Patient settings
Route::get('/patientSettings', [PatientSettings::class, 'index'])->name('patientSettingsView');

Route::put('patient/{patientId}/profile-photo', [PatientSettings::class, 'updateProfilePhoto'])->name('updateProfilePhotoPatient');
Route::put('patient/{patientId}/general', [PatientSettings::class, 'updateGeneralInfo'])->name('updateGeneralInfoPatient');
Route::put('patient/{patientId}/social', [PatientSettings::class, 'updateSocialAccounts'])->name('updateSocialAccountsPatient');
Route::put('patient/{patientId}/update-password', [PatientSettings::class, 'updatePassword'])->name('updatePasswordPatient');
Route::get('/patientProfile', [PatientProfile::class, 'index'])->name('patientProfileView');


//patient Auth
Route::get('/patientSignup', [PatientSignup::class, 'index'])->name('patientSignupView');
Route::post('/patientSignup', [PatientSignup::class, 'store'])->name('patientSignup');
Route::get('/patientLogin', [PatientLogin::class, 'index'])->name('patientLoginView');
Route::post('/patientLogin', [PatientLogin::class, 'authenticate'])->name('patientLoginAuth');
Route::get('/patientLogout', [PatientLogin::class, 'logout'])->name('patientLogout');
