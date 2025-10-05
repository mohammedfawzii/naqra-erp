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
        Schema::create('field_training_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id');
            $table->text('training_description');
            $table->string('training_location')->nullable();
            $table->integer('duration')->default(0);
            $table->enum('status', ['planned', 'in_progress', 'completed'])->default('planned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_training_management');
    }
};
