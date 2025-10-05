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
        Schema::create('turnover_analytics_management', function (Blueprint $table) {
            $table->id();
            $table->enum('analytics_type', ['Monthly', 'Quarterly', 'Yearly'])->default('Monthly');
            $table->string('period')->nullable();
            $table->decimal('turnover_rate', 5, 2)->nullable();
            $table->string('turnover_analytics_report_pdf')->nullable();
            $table->string('turnover_charts_png')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnover_analytics_management');
    }
};
