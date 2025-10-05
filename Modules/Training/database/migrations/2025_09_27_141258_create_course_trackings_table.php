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
        Schema::create('course_trackings', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // employee_info id
            $table->integer('course_id'); // course id
            $table->enum('status', ['not_started', 'in_progress', 'completed'])->default('not_started');
            $table->date('completion_date')->nullable();
            $table->unsignedTinyInteger('progress_percentage')->default(0);
            // $table->unsignedTinyInteger('progress_percentage')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_trackings');
    }
};
