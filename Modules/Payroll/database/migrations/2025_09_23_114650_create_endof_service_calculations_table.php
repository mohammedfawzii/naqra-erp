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
        Schema::create('endof_service_calculations', function (Blueprint $table) {
            $table->id();
            // Employee ID
$table->integer('employee_id');

// Service Duration
        $table->integer('service_duration');

        // End of Service Amount
        $table->decimal('end_of_service_amount', 12, 2);

        // End Date
        $table->date('end_date');

        // Calculation Status
        $table->enum('calculation_status', [
            'pending',
            'calculated',
            'approved',
            'paid',
        ])->default('pending');
            $table->integer('payroll_attachments_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endof_service_calculations');
    }
};
