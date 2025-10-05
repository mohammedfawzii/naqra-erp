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
        Schema::create('contextual_exit_management', function (Blueprint $table) {
            $table->id();
            $table->string('exit_type');                               // نوع الخروج
    $table->text('context_description')->nullable();          // وصف السياق
    $table->string('exit_status')->nullable();                // حالة الخروج
    $table->string('contextual_exit_report_pdf')->nullable(); // تقرير الخروج السياقي PDF
    $table->string('context_analysis_excel')->nullable();     // تحليل السياق Excel
  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contextual_exit_management');
    }
};
