<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    // Show the form for creating a new patient
    public function create()
    {
        return view('patients.create');
    }

    // Store a new patient in the database
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'gender' => 'required|string',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'medical_history' => 'nullable|string',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Handle the image upload
    $photoName = null;
    if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
        $photo = $request->file('profile_image');
        $ext = $photo->getClientOriginalExtension();
        $photoName = time() . '.' . $ext; // Unique image name
        $photo->move(public_path('uploads/patient_images'), $photoName); // Save the image in the uploads directory
    }

    // Create the patient record
    $patient = new Patient();
    $patient->name = $request->name;
    $patient->age = $request->age;
    $patient->gender = $request->gender;
    $patient->phone = $request->phone;
    $patient->address = $request->address;
    $patient->medical_history = $request->medical_history;
    $patient->profile_image = $photoName;
    $patient->save();

    return redirect()->route('patients.list')->with('success', 'Patient registered successfully.');
}


    // Show the list of all patients
public function list()
{
    $patients = Patient::orderBy('created_at','DESC')->paginate(5);
    return view('patients.list', compact('patients'));
}


}

