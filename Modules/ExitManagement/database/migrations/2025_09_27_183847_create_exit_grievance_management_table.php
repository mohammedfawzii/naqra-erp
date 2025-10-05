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
        Schema::create('exit_grievance_management', function (Blueprint $table) {
            $table->id();
            $table->string('grievance_type');                           // نوع الشكوى
            $table->date('grievance_date')->nullable();                 // تاريخ الشكوى
            $table->string('grievance_status')->nullable();             // حالة الشكوى
            $table->string('exit_grievance_report_pdf')->nullable();    // تقرير الشكوى PDF
            $table->string('resolution_plan_excel')->nullable();        // خطة الحل Excel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_grievance_management');
    }
};
