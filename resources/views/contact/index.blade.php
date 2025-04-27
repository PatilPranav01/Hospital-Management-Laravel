@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3">
                @include('layouts.sidebar')
            </div>

            <!-- Contact Form Column -->
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <h3 class="fs-4 mb-3">Contact Us</h3>
                        <p class="text-muted">We'd love to hear from you! Please reach out with any questions or feedback.</p>

                        <!-- Contact Information -->
                        <div class="mb-4">
                            <p><strong>Address:</strong> 123 Health Ave, Cityville</p>
                            <p><strong>Phone:</strong> (123) 456-7890</p>
                            <p><strong>Operating Hours:</strong> Mon-Fri, 9 AM - 5 PM</p>
                        </div>

                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Contact Form -->
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="mb-1 text-muted">Your Name*</label>
                                <input type="text" name="name" id="name" class="form-control shadow-sm" placeholder="Enter Your Name" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="mb-1 text-muted">Your Email*</label>
                                <input type="email" name="email" id="email" class="form-control shadow-sm" placeholder="Enter Your Email" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="mb-1 text-muted">Message*</label>
                                <textarea name="message" id="message" rows="5" class="form-control shadow-sm" placeholder="Enter Your Message" required></textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-3">Send Message</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection
