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
        Schema::create('loan_deductions', function (Blueprint $table) {
            $table->id();
            // Employee ID
            $table->integer('employee_id');

            // Loan Type
            $table->integer('loan_type_id');

            // Deduction Percentage
            $table->decimal('deduction_percentage', 5, 2)->nullable();

            // Deduction Amount
            $table->decimal('deduction_amount', 12, 2);

            // Start Date
            $table->date('start_date');

            // Deduction Status
            $table->enum('deduction_status', [
                'pending',
                'active',
                'completed',
                'cancelled',
            ])->default('pending');

            // End Date
            $table->date('end_date')->nullable();
            $table->integer('payroll_attachments_id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_deductions');
    }
};
