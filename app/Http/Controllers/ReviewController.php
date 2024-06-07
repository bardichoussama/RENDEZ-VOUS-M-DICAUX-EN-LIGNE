<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'rating' => 'required|integer|between:1,5',
            'review' => 'nullable|string',
        ]);

        $patientId = auth()->guard('patient')->id();
        $doctorId = $request->input('doctor_id');

      
        $existingReview = Review::where('patient_id', $patientId)->where('doctor_id', $doctorId)->first();
        if ($existingReview) {
            return redirect()->back()->with('error', 'You have already reviewed this doctor.');
        }

   
        Review::create([
            'patient_id' => $patientId,
            'doctor_id' => $doctorId,
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

  
}
