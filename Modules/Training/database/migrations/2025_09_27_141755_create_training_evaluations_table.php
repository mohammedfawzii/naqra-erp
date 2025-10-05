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
        Schema::create('training_evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // employee_info id
            $table->integer('course_id'); // course id
            $table->unsignedTinyInteger('rating')->comment('Rating out of 10');
            $table->text('feedback')->nullable();
            $table->enum('satisfaction_level', ['very_low', 'low', 'medium', 'high', 'very_high'])
                ->default('medium');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_evaluations');
    }
};
