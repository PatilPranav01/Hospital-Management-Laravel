@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Medical Records</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3">
                @include('layouts.sidebar')
            </div>

            <!-- Main Content Column -->
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="fs-4 mb-0">Medical Records</h3>
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addRecordModal">
                                + Add Medical Record
                            </button>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Diagnosis</th>
                                        <th>Medications</th>
                                        <th>Treatment Notes</th>
                                        <th>Record Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($medicalRecords as $record)
                                    <tr>
                                        <td>{{ $record->patient->name ?? 'Unknown Patient' }}</td>
                                        <td>{{ $record->diagnosis }}</td>
                                        <td>{{ $record->medication }}</td>
                                        <td>{{ $record->notes }}</td>
                                        <td>{{ \Carbon\Carbon::parse($record->record_date)->format('d M Y') }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editRecordModal-{{ $record->id }}">Edit</button>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editRecordModal-{{ $record->id }}" tabindex="-1" aria-labelledby="editRecordModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('medical_records.update', $record->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editRecordModalLabel">Edit Medical Record</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="diagnosis" class="form-label">Diagnosis</label>
                                                                    <input type="text" class="form-control" name="diagnosis" value="{{ $record->diagnosis }}" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="medication" class="form-label">Medications</label>
                                                                    <textarea class="form-control" name="medication">{{ $record->medication }}</textarea>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="notes" class="form-label">Treatment Notes</label>
                                                                    <textarea class="form-control" name="notes">{{ $record->notes }}</textarea>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="record_date" class="form-label">Record Date</label>
                                                                    <input type="date" class="form-control" name="record_date" value="{{ $record->record_date }}" required>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $medicalRecords->links() }}
                        </div>

                        <!-- Add Medical Record Modal -->
                        <div class="modal fade" id="addRecordModal" tabindex="-1" aria-labelledby="addRecordModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('medical_records.store') }}" method="POST">
                                        @csrf

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addRecordModalLabel">Add Medical Record</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="patient_id" class="form-label">Patient</label>
                                                <select name="patient_id" class="form-select" required>
                                                    @foreach(App\Models\Patient::all() as $patient)
                                                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="diagnosis" class="form-label">Diagnosis</label>
                                                <input type="text" class="form-control" name="diagnosis" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="medication" class="form-label">Medications</label>
                                                <textarea class="form-control" name="medication"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="notes" class="form-label">Treatment Notes</label>
                                                <textarea class="form-control" name="notes"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="record_date" class="form-label">Record Date</label>
                                                <input type="date" class="form-control" name="record_date" required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Save Record</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Add Modal -->

                    </div>
                </div>                          
            </div>
        </div>
    </div>
</section>
@endsection
