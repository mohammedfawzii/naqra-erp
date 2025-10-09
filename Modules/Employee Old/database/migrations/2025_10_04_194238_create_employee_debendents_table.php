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
        Schema::create('employee_debendents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');

            // Dependent Info
            $table->json('full_name')->nullable();
            $table->enum('relationship', ['son', 'daughter', 'wife', 'husband', 'father', 'mother', 'brother', 'sister'])->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();

            // ID / Iqama
            $table->string('national_id_number')->nullable();
            $table->date('id_issue_date')->nullable();
            $table->date('id_expiry_date')->nullable();

            // Contact
            $table->string('mobile_number')->nullable();
            
            // Passport Info
            $table->string('passport_number')->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('passport_issue_place')->nullable();

            // Health
            $table->string('health_status')->nullable();
            $table->string('medical_test_status')->nullable();

            // Other
            $table->text('notes')->nullable();

            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_debendents');
    }
};
