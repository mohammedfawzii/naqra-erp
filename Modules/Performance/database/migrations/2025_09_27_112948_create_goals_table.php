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

        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id') ; //Employeeinfo
            $table->string('goal_name');
            $table->text('goal_description')->nullable();
            $table->unsignedTinyInteger('goal_measure')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('goal_status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending');
            $table->enum('goal_priority', ['low', 'medium', 'high'])->default('medium');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
