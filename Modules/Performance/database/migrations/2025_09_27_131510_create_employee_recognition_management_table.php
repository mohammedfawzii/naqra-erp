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
        Schema::create('employee_recognition_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // Employee in Employee
            $table->string('recognition_type');        //
            $table->text('recognition_description')->nullable(); //  
            $table->date('recognition_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_recognition_management');
    }
};
