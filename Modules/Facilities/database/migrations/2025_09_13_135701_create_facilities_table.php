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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->boolean('have_branches')->default(false);
            $table->integer('employee_count')->default(0);
            $table->string('national_number_alone')->nullable(); 
            $table->enum('status', ['active', 'not_active'])->default('active');
            $table->string('activity')->nullable();
            $table->integer('completion_percentage')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
