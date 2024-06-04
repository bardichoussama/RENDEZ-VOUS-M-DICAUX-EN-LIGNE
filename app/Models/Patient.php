<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Authenticatable
{
    use HasFactory, Notifiable;

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
    public function pendingAppointments(){
        return $this->hasMany(Appointment::class)->where('status', 'pending');
    }


    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'birth',
        'height',
        'weight',
        'image',
        'bio',
        'password',
        'allergies',
        'bloodtype',
        'city',
        'address',
        'facebook',
        'linkedin',
        'instagram',
        'gender'
    ];

    // // Hide the password and remember token fields
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // // Cast attributes to native types
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
