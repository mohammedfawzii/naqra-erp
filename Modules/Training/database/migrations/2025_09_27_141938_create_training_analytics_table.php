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
        Schema::create('training_analytics', function (Blueprint $table) {
            $table->id();
            $table->string('time_period');
            $table->unsignedInteger('participants_count')->default(0);
            $table->decimal('average_rating')->default(0);
            $table->decimal('completion_rate')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_analytics');
    }
};
