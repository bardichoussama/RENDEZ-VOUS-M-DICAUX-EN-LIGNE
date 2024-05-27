<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $fillable = [
        'doctor_id', 
        'patient_id', 
        'requested_date', 
        'confirmed_date', 
        'appointment_date', 
        'price', 
        'status', 
        'message'
    ];
    use HasFactory;

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}
