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
        Schema::create('multi_country_payrolls', function (Blueprint $table) {
            $table->id();
            // Employee ID
$table->integer('employee_id');

// Country ID
$table->integer('country_id');

// Basic Salary
$table->decimal('basic_salary', 12, 2);

// Currency ID
$table->integer('currency_id');

// Compliance Status
$table->enum('compliance_status', [
    'pending',
    'compliant',
    'non_compliant',
])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multi_country_payrolls');
    }
};
