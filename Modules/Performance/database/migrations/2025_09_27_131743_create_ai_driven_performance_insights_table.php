<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ai_driven_performance_insights', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // Employee in Employee
            $table->text('ai_recommendation')->nullable(); //
            $table->decimal('probability_score', 5, 2)->nullable(); //
            $table->date('analysis_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_driven_performance_insights');
    }
};
