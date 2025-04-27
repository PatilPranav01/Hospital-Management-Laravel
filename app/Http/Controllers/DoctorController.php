<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Display a list of doctors
    public function list()
    {
        $doctors = Doctor::orderBy('created_at','DESC')->paginate(5);
        return view('doctors.list', compact('doctors'));
    }

    // Show form to create a new doctor
    public function create()
    {
        return view('doctors.create');
    }

    // Store a new doctor in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'availability' => 'required|string|max:255',
        ]);

        Doctor::create($request->all());

        return redirect()->route('doctors.list')->with('success', 'Doctor added successfully.');
    }

    // Show form to edit an existing doctor
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    // Update the doctor record in the database
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'availability' => 'required|string|max:255',
        ]);

        $doctor->update($request->all());

        return redirect()->route('doctors.list')->with('success', 'Doctor updated successfully.');
    }

    // Delete a doctor from the database
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.list')->with('success', 'Doctor deleted successfully.');
    }
}

