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
        Schema::create('benefits_and_compensation_analytics', function (Blueprint $table) {
            $table->id();
            $table->string('time_period');                    // الفترة (مثلاً: "Q1 2025")
            $table->decimal('benefits_cost')->nullable();  // تكلفة المزايا
            $table->decimal('usage_rate')->nullable();      // نسبة الاستخدام (%)
            $table->decimal('roi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefits_and_compensation_analytics');
    }
};
