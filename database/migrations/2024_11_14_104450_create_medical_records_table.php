<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('patient_id'); // Foreign key for patient
            $table->date('record_date'); // Date of the record
            $table->text('diagnosis')->nullable(); // Diagnosis details
            $table->text('treatment')->nullable(); // Treatment plan
            $table->string('doctor_name')->nullable(); // Doctor's name
            $table->text('notes')->nullable(); // Additional notes
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
