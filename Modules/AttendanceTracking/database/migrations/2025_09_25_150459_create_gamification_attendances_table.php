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
        Schema::create('gamification_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('attendance_points')->default(0);
            $table->string('earned_rewards');
            $table->string('progress_level');
            $table->integer('attendance_attachments_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gamification_attendances');
    }
};
