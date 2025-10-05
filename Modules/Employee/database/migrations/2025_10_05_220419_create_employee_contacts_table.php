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
        Schema::create('employee_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('personal_email')->nullable();
            $table->string('company_email')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('mobile_number_two')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone', 20)->nullable();
            $table->string('job_title')->nullable();
            $table->enum('relation', ['father', 'mother', 'son', 'daughter', 'brother', 'sister', 'wife', 'husband', 'friend'])->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_phone', 20)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_contacts');
    }
};
