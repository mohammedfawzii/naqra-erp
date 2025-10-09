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
        Schema::create('employee_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('course_name')->nullable();
            $table->string('course_type')->nullable();
            $table->string('program_type')->nullable();

            $table->string('sponsored')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('course_value')->nullable();

            $table->string('trainer')->nullable();
            $table->string('training_entity')->nullable();
            $table->string('training_location')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('location')->nullable();

            $table->string('issuer')->nullable();
            $table->string('certificate_number')->nullable();
            $table->date('certificate_end_date')->nullable();
            $table->date('certificate_issue_date')->nullable();
            $table->string('grade')->nullable();
            $table->integer('hours_count')->nullable();

            $table->text('notes')->nullable();
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');      

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_courses');
    }
};
