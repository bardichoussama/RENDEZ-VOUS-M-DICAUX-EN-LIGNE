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
use App\Http\Controllers\PatientAppointment;
use App\Http\Controllers\PatientDashboard;
use App\Http\Controllers\PatientLogin;
use App\Http\Controllers\PatientProfile;
use App\Http\Controllers\PatientSettings;
use App\Http\Controllers\PatientSignup;
use App\Http\Controllers\PatientsRequests;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('HomePage');
})->name('doctorHomePage');

// Choice Page
Route::get('/choicePage', [ChoicePage::class, 'index'])->name('choicePage');

// Doctor Routes
Route::middleware(['auth:doctor'])->group(function () {
    Route::get('/doctorProfile', [DoctorProfile::class, 'index'])->name('doctorProfileView');
    Route::get('/doctorDashboard', [DoctorDashboard::class, 'index'])->name('doctorDashboardView');
    Route::get('/api/gender-counts', [DoctorDashboard::class, 'getGenderCounts']);
    Route::get('/doctor/todays-appointments', [DoctorDashboard::class, 'getTodaysAppointments'])->name('doctor.todaysAppointments');
    Route::get('/doctorAppointments', [DoctorAppointments::class, 'index'])->name('doctorAppointmentsView');
    Route::get('/patientsRequests', [PatientsRequests::class, 'index'])->name('patientsRequests');
    Route::post('/edit-Appointments/{id}', [PatientsRequests::class, 'accept'])->name('editAppointments');
    Route::put('/drop-Appointments/{appId}', [PatientsRequests::class, 'reject'])->name('rejectAppointments');
    Route::put('/done-Appointments/{appId}', [DoctorDashboard::class, 'complete'])->name('completedAppointments');

    // Doctor settings
    Route::get('/doctorSettings', [DoctorSettings::class, 'index'])->name('doctorSettingsView');
    Route::put('/doctor/{doctorId}/profile-photo', [DoctorSettings::class, 'updateProfilePhoto'])->name('doctorProfilePhoto');
    Route::put('/doctor/{doctorId}/social-accounts', [DoctorSettings::class, 'updateSocialAccounts'])->name('doctorSocialAccounts');
    Route::put('/doctor/{doctorId}/general-info', [DoctorSettings::class, 'updateGeneralInfo'])->name('doctorGeneralInfo');
    Route::put('/doctor/{doctorId}/update-password', [DoctorSettings::class, 'updatePassword'])->name('doctorPasswordUpdate');

    Route::get('/doctorLogout', [DoctorLogin::class, 'logout'])->name('doctorLogout');
});

// Doctor Auth Routes
Route::get('/doctorSignup', [DoctorSignup::class, 'index'])->name('doctorSignupView');
Route::post('/doctorSignup', [DoctorSignup::class, 'store'])->name('doctorSignup');
Route::get('/doctorLogin', [DoctorLogin::class, 'index'])->name('doctorLoginView');
Route::post('/doctorLogin', [DoctorLogin::class, 'authenticate'])->name('doctorAuthenticate');

// Patient Routes
Route::middleware(['auth:patient'])->group(function () {
    Route::get('/patientHomePage', [DoctorProfile::class, 'index'])->name('patientHomePag');
    Route::get('/patientApointments', [PatientAppointment::class, 'index'])->name('patientApointmentsView');
    Route::get('/patientDashboard', [PatientDashboard::class, 'index'])->name('patientDashboardView');
    Route::get('/patientDoctorsList', [DoctorController::class, 'DoctorsList'])->name('patientDoctorsList');
    Route::post('/patient-DoctorsList/{doctorId}', [DoctorController::class, 'requestAppointments'])->name('requestAppointment');
    Route::get('/patientSettings', [PatientSettings::class, 'index'])->name('patientSettingsView');
    Route::put('patient/{patientId}/profile-photo', [PatientSettings::class, 'updateProfilePhoto'])->name('updateProfilePhotoPatient');
    Route::put('patient/{patientId}/general', [PatientSettings::class, 'updateGeneralInfo'])->name('updateGeneralInfoPatient');
    Route::put('patient/{patientId}/social', [PatientSettings::class, 'updateSocialAccounts'])->name('updateSocialAccountsPatient');
    Route::put('patient/{patientId}/update-password', [PatientSettings::class, 'updatePassword'])->name('updatePasswordPatient');
    Route::get('/patientProfile', [PatientProfile::class, 'index'])->name('patientProfileView');

    Route::get('/patientLogout', [PatientLogin::class, 'logout'])->name('patientLogout');
});

// Patient Auth Routes
Route::get('/patientSignup', [PatientSignup::class, 'index'])->name('patientSignupView');
Route::post('/patientSignup', [PatientSignup::class, 'store'])->name('patientSignup');
Route::get('/patientLogin', [PatientLogin::class, 'index'])->name('patientLoginView');
Route::post('/patientLogin', [PatientLogin::class, 'authenticate'])->name('patientLoginAuth');

// Review Routes
Route::middleware(['auth:doctor', 'auth:patient'])->group(function () {
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});
