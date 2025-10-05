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
        Schema::create('employee_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');

            $table->string('entity_name')->nullable();

            $table->json('job_title')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->string('volunteer_experiences')->nullable();
            $table->string('unofficial_experiences')->nullable();

            $table->string('previous_salary')->nullable();
            $table->string('previous_evaluation')->nullable();
            $table->string('leaving_reason')->nullable();

            $table->text('responsibilities')->nullable();

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
        Schema::dropIfExists('employee_experiences');
    }
};
