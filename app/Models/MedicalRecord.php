<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'record_date',
        'diagnosis',
        'medication',
        'doctor_name',
        'notes',
    ];

    /**
     * Relationship with Patient model.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
