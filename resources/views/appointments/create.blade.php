@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Schedule Appointment</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3">
                @include('layouts.sidebar')
            </div>

            <!-- Form Column -->
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <h3 class="fs-4 mb-3">Schedule Appointment</h3>

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Appointment Form -->
                        <form action="{{ route('appointments.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="patient" class="mb-1 text-muted">Patient*</label>
                                <select class="form-control shadow-sm" id="patient" name="patient_id" required>
                                    <option value="">Select Patient</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="doctor" class="mb-1 text-muted">Doctor*</label>
                                <select class="form-control shadow-sm" id="doctor" name="doctor_id" required>
                                    <option value="">Select Doctor</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialization }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="mb-1 text-muted">Date*</label>
                                <input type="date" class="form-control shadow-sm" id="date" name="date" required>
                            </div>

                            <div class="mb-3">
                                <label for="time" class="mb-1 text-muted">Time*</label>
                                <input type="time" class="form-control shadow-sm" id="time" name="time" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-3">Schedule Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
