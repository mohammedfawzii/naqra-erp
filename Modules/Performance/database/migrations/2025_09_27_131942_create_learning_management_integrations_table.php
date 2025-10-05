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
        Schema::create('learning_management_integrations', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // Employee in Employee
            $table->string('learning_platform');           // منصة التعلم
            $table->string('integration_status')->nullable(); // حالة التكامل
            $table->string('suggested_course')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_management_integrations');
    }
};
