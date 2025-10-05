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
        Schema::create('predictive_turnover_management', function (Blueprint $table) {
            $table->id();
            $table->string('prediction_type');
            $table->float('prediction_rate')->nullable();
            $table->string('period')->nullable();                       
            $table->string('predictive_turnover_report_pdf')->nullable();
            $table->string('prediction_charts_png')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictive_turnover_management');
    }
};
