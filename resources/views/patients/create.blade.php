@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Register Patient</li>
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
                        <h3 class="fs-4 mb-3">Register Patient</h3>

                        <!-- Patient Registration Form -->
                        <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data" id="patientRegistrationForm">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="mb-1 text-muted">Name*</label>
                                <input type="text" name="name" id="name" class="form-control shadow-sm" placeholder="Enter Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="age" class="mb-1 text-muted">Age*</label>
                                <input type="number" name="age" id="age" class="form-control shadow-sm" placeholder="Enter Age" required>
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="mb-1 text-muted">Gender*</label>
                                <select name="gender" id="gender" class="form-control shadow-sm" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="mb-1 text-muted">Phone Number*</label>
                                <input type="text" name="phone" id="phone" class="form-control shadow-sm" placeholder="Enter Phone Number" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="mb-1 text-muted">Address*</label>
                                <input type="text" name="address" id="address" class="form-control shadow-sm" placeholder="Enter Address" required>
                            </div>

                            <div class="mb-3">
                                <label for="medical_history" class="mb-1 text-muted">Medical History</label>
                                <textarea name="medical_history" id="medical_history" class="form-control shadow-sm" placeholder="Enter Medical History"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="profile_image" class="mb-1 text-muted">Profile Image</label>
                                <input type="file" name="profile_image" id="profile_image" class="form-control shadow-sm">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-3" >Register</button>
                        </form>                    
                    </div>
                </div> 

            </div>
        </div>
    </div>
</section>
@endsection
