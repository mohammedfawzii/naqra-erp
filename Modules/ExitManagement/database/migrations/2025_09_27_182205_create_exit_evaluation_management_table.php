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
        Schema::create('exit_evaluation_management', function (Blueprint $table) {
            $table->id();
            $table->enum('evaluation_type', ['Exit Interview', 'Survey', 'Peer Review'])->default('Exit Interview');
            $table->date('evaluation_date')->nullable();           // تاريخ التقييم
            $table->decimal('satisfaction_rate', 5, 2)->nullable(); // معدل الرضا (%)
            $table->string('exit_evaluation_report_pdf')->nullable(); // تقرير التقييم PDF
            $table->string('evaluation_charts_png')->nullable();      // مخططات التقييم PNG

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_evaluation_management');
    }
};
