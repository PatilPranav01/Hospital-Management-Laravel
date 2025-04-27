@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}}}">Home</a></li>
                        <li class="breadcrumb-item active">Patients</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Patient List</h3>
                            </div>
                        </div>

                        <!-- Display success message -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Patient Table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Medical History</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @if ($patients->isNotEmpty())
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td>
                                                    @if ($patient->profile_image)
                                                        <img style="width: 200px; height: 200px; object-fit: cover;" src="{{ asset('uploads/patient_images/' . $patient->profile_image) }}" alt="{{ $patient->name }}">
                                                    @else
                                                        <img style="width: 200px; height: 200px; object-fit: cover;" src="{{ asset('uploads/patient_images/default.jpg') }}" alt="Default Image">
                                                    @endif
                                                </td>
                                                <td>{{ $patient->name }}</td>
                                                <td>{{ $patient->age }}</td>
                                                <td>{{ $patient->gender }}</td>
                                                <td>{{ $patient->phone }}</td>
                                                <td>{{ $patient->address }}</td>
                                                <td>{{ $patient->medical_history ?? 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">No patients found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination links -->
                        <div>
                            {{ $patients->links() }}
                        </div>
                    </div>
                </div>                          
            </div>
        </div>
    </div>
</section>
@endsection
