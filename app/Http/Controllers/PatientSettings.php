<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientSettings extends Controller
{
    public function index()
    {
        return view('patient.patientSettings');
    }
    public function updateProfilePhoto(Request $request, $patientId)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:800'
        ]);

        $patient = Patient::find($patientId);

        if (!$patient) {
            return redirect()->back()->with('error', 'Patient not found.');
        }

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('', $fileName, 'patient_images');

            $patient->image = 'assets/img/patientImgs/' . $fileName;
            $patient->save();
        }

        return redirect()->back()->with('status', 'Profile photo updated successfully!');
    }


    public function updateSocialAccounts(Request $request, $patientId)
    {
        $request->validate([
            'facebook' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ]);

        $patient = Patient::find($patientId);
        $patient->update([
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
        ]);
        return redirect()->back()->with('status', 'Profile photo updated successfully!');
    }


    public function updateGeneralInfo(Request $request, $patientId)
    {
        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:patients,email,' . $patientId,
            'phone' => 'nullable|string|max:20',
            'blood_type' => 'nullable|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'birthday' => 'nullable|date',
            'height' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'allergies' => 'nullable|string|max:1000',
            'bio' => 'nullable|string|max:1000',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female'
        ]);

        $patient = Patient::findOrFail($patientId);

        $patient->firstname = $request->first_name ;
        $patient->lastname = $request->last_name ;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->blood_type = $request->blood_type;
        $patient->birth = $request->birthday;
        $patient->height = $request->height;
        $patient->weight = $request->weight;
        $patient->allergies = $request->allergies;
        $patient->bio = $request->bio;
        $patient->city = $request->city ;
        $patient->address = $request->address ;
        $patient->gender = $request->gender;

        $patient->save();

        return redirect()->back()->with('status', 'General information updated successfully!');
    }



    public function updatePassword()
    {
    }
}
