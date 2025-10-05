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
        Schema::create('leave_balances', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id'); // Employee ID
            $table->integer('holidays_list_id'); // Leave Type
            $table->integer('available_balance')->default(0); // Available Balance (days)
            $table->integer('used_balance')->default(0); // Used Balance (days)
            $table->integer('attendance_attachments_id')->nullable(); // Foreign key to attachments table

             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_balances');
    }
};
