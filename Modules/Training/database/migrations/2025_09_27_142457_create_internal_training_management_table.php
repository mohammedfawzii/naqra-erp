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

         Schema::create('internal_training_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // employee_info id
            $table->integer('course_id'); // course id
            $table->string('trainer_name')->nullable();
            $table->string('location')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('internal_training_management');

    }
};
