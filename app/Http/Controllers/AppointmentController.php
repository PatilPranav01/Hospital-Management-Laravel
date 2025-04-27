<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    // Show the form for creating a new appointment
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('appointments.create', compact('patients', 'doctors'));
    }

    // Store the new appointment in the database
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Check if the doctor is available at the selected date and time
        $appointmentExists = Appointment::where('doctor_id', $request->doctor_id)
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->exists();

        if ($appointmentExists) {
            return redirect()->back()->withErrors('The doctor is not available at the selected time.');
        }

        // Create a new appointment
        Appointment::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return redirect()->route('appointments.list')->with('success', 'Appointment scheduled successfully.');
    }

    // Display a listing of appointments
    public function list()
    {
        $appointments = Appointment::with(['patient', 'doctor'])->paginate(5); // Eager load patient and doctor
        return view('appointments.list', compact('appointments'));
    }

}
