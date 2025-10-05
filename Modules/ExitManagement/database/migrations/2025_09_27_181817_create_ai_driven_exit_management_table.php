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
        Schema::create('ai_driven_exit_management', function (Blueprint $table) {
            $table->id();
            $table->enum('exit_type', ['Resignation', 'Retirement', 'Termination'])->default('Resignation');
            $table->text('ai_recommendation')->nullable();  // توصية الذكاء الاصطناعي
            $table->decimal('turnover_rate', 5, 2)->nullable(); // معدل التسرب (%)
            $table->string('ai_exit_report_pdf')->nullable();   // تقرير PDF
            $table->string('ai_analysis_excel')->nullable();    // تحليل Excel

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_driven_exit_management');
    }
};
