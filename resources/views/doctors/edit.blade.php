@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{{ route('home') }}}}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Doctor</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-lg-9">
                
                <form action="{{ route('doctors.update', $doctor) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Edit Doctor</h3>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="name" class="mb-2">Name<span class="req">*</span></label>
                                    <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control" value="{{ old('name', $doctor->name) }}" placeholder="Doctor Name" required>
                                    @error('name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="specialization" class="mb-2">Specialization<span class="req">*</span></label>
                                    <input type="text" name="specialization" id="specialization" class="@error('specialization') is-invalid @enderror form-control" value="{{ old('specialization', $doctor->specialization) }}" placeholder="Specialization" required>
                                    @error('specialization')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="contact_number" class="mb-2">Contact Number<span class="req">*</span></label>
                                    <input type="text" name="contact_number" id="contact_number" class="@error('contact_number') is-invalid @enderror form-control" value="{{ old('contact_number', $doctor->contact_number) }}" placeholder="Contact Number" required>
                                    @error('contact_number')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="availability" class="mb-2">Availability<span class="req">*</span></label>
                                    <input type="text" name="availability" id="availability" class="@error('availability') is-invalid @enderror form-control" value="{{ old('availability', $doctor->availability) }}" placeholder="Availability" required>
                                    @error('availability')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer p-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
