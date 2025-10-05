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
        Schema::create('competency_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // Employee in Employee
            $table->string('competency');               
            $table->string('competency_rating')->nullable();    
            $table->string('target_competency')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_management');
    }
};
