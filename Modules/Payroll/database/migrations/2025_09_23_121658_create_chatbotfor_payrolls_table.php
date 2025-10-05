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
        Schema::create('chatbotfor_payrolls', function (Blueprint $table) {
            $table->id();
            // Employee ID
            $table->integer('employee_id');

            // Query Type
            $table->enum('query_type', [
                'salary',
                'benefit',
                'tax',
                'leave',
                'other',
            ])->default('other');

            // Date
            $table->date('date');

            // Query Date
            $table->date('query_date');

            // Query Status
            $table->enum('query_status', [
                'pending',
                'in_progress',
                'resolved',
                'closed',
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatbotfor_payrolls');
    }
};
