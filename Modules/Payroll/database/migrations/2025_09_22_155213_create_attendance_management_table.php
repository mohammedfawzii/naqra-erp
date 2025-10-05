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
        Schema::create('attendance_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->date('attendance_date');
            $table->integer('time_in');
            $table->integer('time_out');
            $table->integer('work_hours');
            $table->integer('overtime_hours');
            $table->integer('payroll_attachments_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_management');
    }
};
