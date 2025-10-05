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
        Schema::create('attendance_trackings', function (Blueprint $table) {
          $table->id();

            $table->integer('employee_id'); // Employee ID
            $table->date('attendance_date'); // Attendance Date
            $table->enum('attendance_type', ['present', 'absent', 'late', 'leave'])->default('present'); // Attendance Type
            $table->time('check_in_time')->nullable(); // Check-in Time
            $table->time('check_out_time')->nullable(); // Check-out Time
            $table->decimal('overtime_hours', 5, 2)->default(0); // Overtime Hours
            $table->decimal('working_hours', 5, 2)->default(0); // Working Hours
            $table->integer('attendance_attachments_id')->nullable(); // Foreign key to attachments table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_trackings');
    }
};
