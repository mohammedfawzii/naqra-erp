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
        Schema::create('employee_leave_self_services', function (Blueprint $table) {
            $table->id();
             $table->integer('employee_id'); // Employee ID
            $table->integer('holidays_list_id'); // Leave Type
            $table->enum('request_status', ['pending', 'approved', 'rejected'])->comment('Request Status');
            $table->integer('attendance_attachments_id')->nullable(); // Foreign key to attachments table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_leave_self_services');
    }
};
