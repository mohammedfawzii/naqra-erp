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
        Schema::create('gamification_for_benefits', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // employee_info id
            $table->integer('benefits_points')->default(0);
            $table->string('earned_rewards')->nullable();
            $table->string('progress_level')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gamification_for_benefits');
    }
};
