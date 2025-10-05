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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id'); // Employee ID
            $table->integer('holidays_list_id'); // Leave Type
            $table->date('start_date'); // Start Date
            $table->date('end_date'); // End Date
            $table->enum('request_status', ['pending', 'approved', 'rejected'])->default('pending'); // Request Status
            $table->integer('attendance_attachments_id')->nullable(); // Foreign key to attachments table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
