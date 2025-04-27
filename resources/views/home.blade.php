@extends('layouts.app')

@section('main')
<section class="section-0 lazy d-flex bg-image-style dark align-items-center" data-bg="{{ asset('assets/images/banner7.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Your Health, Our Priority</h1>
                <p>Providing quality healthcare services to you and your family.</p>
                <div class="banner-btn mt-5">
                    <a href="departments.html" class="btn btn-primary mb-4 mb-sm-0">Explore Departments</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-1 py-5">
    <div class="container">
        <div class="card border-0 shadow p-5">
            <div class="row">
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Doctor or Department Name">
                </div>
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                </div>
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <select name="specialty" id="specialty" class="form-control">
                        <option value="">Select Specialty</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="neurology">Neurology</option>
                        <option value="pediatrics">Pediatrics</option>
                        <option value="orthopedics">Orthopedics</option>
                    </select>
                </div>
                
                <div class="col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                    <div class="d-grid gap-2">
                        <a href="search-results.html" class="btn btn-primary btn-block">Search</a>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>

@endsection