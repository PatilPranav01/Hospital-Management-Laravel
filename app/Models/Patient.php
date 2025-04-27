<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',          // Allow mass assignment for 'name'
        'age',
        'gender',
        'phone',
        'address',
        'medical_history',
        'profile_image', // Add 'profile_image' if you're storing image paths
    ];
}
