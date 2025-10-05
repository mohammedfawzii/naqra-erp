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
        Schema::create('shift_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id'); // Employee ID
            $table->enum('shift_type', ['morning', 'evening', 'night', 'flexible']); // Shift Type
            $table->date('shift_date'); // Shift Date
            $table->time('start_time'); // Start Time
            $table->time('end_time')->nullable(); // End Time (optional)
            $table->integer('attendance_attachments_id')->nullable(); // Foreign key to attachments table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_schedules');
    }
};
