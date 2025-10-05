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
        Schema::create('biometric_integrations', function (Blueprint $table) {
            $table->id();
              $table->integer('employee_id'); // Employee ID
            $table->enum('biometric_type', ['fingerprint', 'face', 'iris', 'voice'])->comment('Biometric Type');
            $table->date('registration_date')->comment('Registration Date');
                                    $table->integer('attendance_attachments_id')->nullable(); // Foreign key to attachments table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biometric_integrations');
    }
};
