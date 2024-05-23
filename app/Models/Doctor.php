<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name', 
        'last_name',
        'email',
        'password',
        'phone',
        'specialty_id',
        'years_of_exp',
        'about',
        'address',
        'facebook',
        'linkedin',
        'instagram',
        'image',
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}
