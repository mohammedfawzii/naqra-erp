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
        Schema::create('ai_driven_benefits_recommendations', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id');
            $table->string('recommended_benefit');
            $table->text('recommendation_reason')->nullable();
            $table->decimal('fit_score')->nullable();   

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_driven_benefits_recommendations');
    }
};
