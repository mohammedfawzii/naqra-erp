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
        Schema::create('attendance_leave_analytics', function (Blueprint $table) {
            $table->id();
            $table->string('time_period'); // Time Period
            $table->decimal('attendance_rate', 5, 2)->default(0); // Attendance Rate (%)
            $table->decimal('absence_rate', 5, 2)->default(0); // Absence Rate (%)
            $table->decimal('leave_taken_report', 5, 2)->default(0); // Leave Taken Report (days)
            $table->integer('attendance_attachments_id')->nullable(); // Foreign key to attachments table

            $table->timestamps();

         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_leave_analytics');
    }
};
