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
        Schema::create('exit_behavioral_analytics_management', function (Blueprint $table) {
            $table->id();
            $table->string('analytics_type');                      // نوع التحليل
            $table->string('period')->nullable();                  // الفترة
            $table->decimal('behavior_rate', 5, 2)->nullable();    // معدل السلوك (%)
            $table->string('exit_behavioral_report_pdf')->nullable(); // تقرير السلوك PDF
            $table->string('behavior_charts_png')->nullable();       // مخططات السلوك PNG

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_behavioral_analytics_management');
    }
};
