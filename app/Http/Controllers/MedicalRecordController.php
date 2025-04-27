<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    // Show all medical records
    public function index()
    {
        $this->authorize('viewAny', MedicalRecord::class);

        $medicalRecords = MedicalRecord::with('patient')->orderBy('created_at', 'DESC')->paginate(5);

        return view('medical_records.index', compact('medicalRecords'));
    }

    // Show create form (optional if needed)
    public function create()
    {
        $this->authorize('create', MedicalRecord::class);

        $patients = Patient::all();

        return view('medical_records.create', compact('patients'));
    }

    // Store new medical record
    public function store(Request $request)
    {
        $this->authorize('create', MedicalRecord::class);

        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'record_date' => 'required|date',
            'diagnosis' => 'required|string|max:255',
            'medication' => 'nullable|string|max:255',
            'doctor_name' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        MedicalRecord::create($validated);

        return redirect()->route('medical_records.index')->with('success', 'Medical record created successfully.');
    }

    // Show edit form
    public function edit(MedicalRecord $medicalRecord)
    {
        $this->authorize('update', $medicalRecord);

        $patients = Patient::all();

        return view('medical_records.edit', compact('medicalRecord', 'patients'));
    }

    // Update medical record
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $this->authorize('update', $medicalRecord);

        $validated = $request->validate([
            'diagnosis' => 'required|string|max:255',
            'medication' => 'nullable|string|max:255',
            'doctor_name' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $medicalRecord->update($validated);

        return redirect()->route('medical_records.index')->with('success', 'Medical record updated successfully.');
    }

    // Delete medical record
    public function destroy(MedicalRecord $medicalRecord)
    {
        $this->authorize('delete', $medicalRecord);

        $medicalRecord->delete();

        return redirect()->route('medical_records.index')->with('success', 'Medical record deleted successfully.');
    }
}
