<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Patient Routes
Route::prefix('patients')->group(function () {
    Route::get('/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/store', [PatientController::class, 'store'])->name('patients.store');
    Route::get('/list', [PatientController::class, 'list'])->name('patients.list');
});

// Doctor Routes
Route::prefix('doctors')->group(function () {
    Route::any('/list', [DoctorController::class, 'list'])->name('doctors.list');
    Route::any('/create', [DoctorController::class, 'create'])->name('doctors.create');
    Route::any('/store', [DoctorController::class, 'store'])->name('doctors.store');
    Route::any('/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
    Route::put('/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');
    Route::delete('/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
});

// Appointment Routes
Route::prefix('appointments')->name('appointments.')->group(function () {
    Route::any('/create', [AppointmentController::class, 'create'])->name('create');
    Route::any('/store', [AppointmentController::class, 'store'])->name('store');
    Route::any('/list', [AppointmentController::class, 'list'])->name('list');
});

// Authentication Routes
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form'); // ✅ fixed name to login.form
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Profile Route
Route::get('profile', [AuthController::class, 'showProfile'])->name('profile')->middleware('auth');

// Medical Records Routes (Only doctors and nurses)
Route::middleware(['auth', 'role:doctor,nurse'])->prefix('medical-records')->name('medical_records.')->group(function () {
    Route::get('/', [MedicalRecordController::class, 'index'])->name('index');
    Route::post('/', [MedicalRecordController::class, 'store'])->name('store');
    Route::put('/{medicalRecord}', [MedicalRecordController::class, 'update'])->name('update');
});

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
