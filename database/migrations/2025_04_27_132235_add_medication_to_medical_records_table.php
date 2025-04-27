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
        Schema::table('medical_records', function (Blueprint $table) {
            if (!Schema::hasColumn('medical_records', 'medication')) {
                $table->string('medication')->nullable();
            }
            if (!Schema::hasColumn('medical_records', 'doctor_name')) {
                $table->string('doctor_name')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medical_records', function (Blueprint $table) {
            if (Schema::hasColumn('medical_records', 'medication')) {
                $table->dropColumn('medication');
            }
            if (Schema::hasColumn('medical_records', 'doctor_name')) {
                $table->dropColumn('doctor_name');
            }
        });
    }
};
