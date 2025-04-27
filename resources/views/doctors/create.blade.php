@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add New Doctor</li>
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
                        <h3 class="fs-4 mb-3">Add New Doctor</h3>

                        <!-- Doctor Registration Form -->
                        <form action="{{ route('doctors.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="mb-1 text-muted">Name*</label>
                                <input type="text" name="name" id="name" class="form-control shadow-sm" placeholder="Enter Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="specialization" class="mb-1 text-muted">Specialization*</label>
                                <input type="text" name="specialization" id="specialization" class="form-control shadow-sm" placeholder="Enter Specialization" required>
                            </div>

                            <div class="mb-3">
                                <label for="contact_number" class="mb-1 text-muted">Contact Number*</label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control shadow-sm" placeholder="Enter Contact Number" required>
                            </div>

                            <div class="mb-3">
                                <label for="availability" class="mb-1 text-muted">Availability*</label>
                                <input type="text" name="availability" id="availability" class="form-control shadow-sm" placeholder="Enter Availability" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-3">Add Doctor</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection
