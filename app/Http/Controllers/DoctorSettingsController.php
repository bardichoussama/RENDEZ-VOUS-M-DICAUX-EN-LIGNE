<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\Node\Specificity;

class DoctorSettingsController extends Controller
{
    public function index()
    {

        $specialties = Specialty::all();
        return view('doctor.doctorSettings', compact('specialties'));
    }

    public function updateProfilePhoto(Request $request, $doctorId)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:800'
        ]);

        $doctor = Doctor::find($doctorId);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->storeAs('', $request->file('profile_photo')->getClientOriginalName(), 'doctor_images');
            $doctor->image = 'assets/img/doctorImgs/' . $request->file('profile_photo')->getClientOriginalName();
            $doctor->save();
        }

        return redirect()->back()->with('status', 'Profile photo updated successfully!');
    }



    public function updateSocialAccounts(Request $request, $doctorId)
    {
        $request->validate([
            'facebook' => 'required|url',
            'linkedin' => 'required|url',
            'instagram' => 'required|url'
        ]);

        $doctor = Doctor::find($doctorId);
        $doctor->facebook = $request->facebook;
        $doctor->linkedin = $request->linkedin;
        $doctor->instagram = $request->instagram;
        $doctor->save();

        return redirect()->back()->with('status', 'Social accounts updated successfully!');
    }


    public function updateGeneralInfo(Request $request, $doctorId)
    {
       
        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'experience' => 'nullable|integer',
            'specialtie' => 'nullable|exists:specialties,id',
            'price' => 'nullable|numeric',
            'bio' => 'nullable|string|max:1000'
        ]);
    

        $doctor = Doctor::findOrFail($doctorId);
    
   
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->address = $request->address;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone_number;
        $doctor->specialty_id = $request->specialtie;
        $doctor->years_of_exp = $request->experience;
        $doctor->consultation_price = $request->price;
        $doctor->about = $request->bio;
        $doctor->save();
    
     
        return redirect()->back()->with('status', 'General information are updated successfully!');
    }
    


    public function updatePassword(Request $request, $doctorId)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|same:new_password'
        ]);

        $doctor = Doctor::find($doctorId);

        if (!Hash::check($request->current_password, $doctor->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $doctor->password = Hash::make($request->new_password);
        $doctor->save();

        return redirect()->back()->with('status', 'Password updated successfully!');
    }
}
