@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4 bg-light">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                @include('layouts.sidebar')
            </div>

            <!-- Profile Section -->
            <div class="col-lg-9">
                
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4">
                        <h3 class="fs-4 mb-3 text-center">Welcome, {{ auth()->user()->name }}!</h3>
                        
                        <!-- Profile Information -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email:</label>
                            <p class="form-control">{{ auth()->user()->email }}</p>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="form-label">Role:</label>
                            <p class="form-control">{{ ucfirst(auth()->user()->role) }}</p>
                        </div>
                    </div>

                    

                    <!-- Logout Button -->
                    <div class="text-center my-3">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
