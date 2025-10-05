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
        Schema::create('a_i_driven_learning_recommendations', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // employee_info id
             $table->string('recommended_course');
            $table->text('recommendation_reason')->nullable();
            $table->unsignedTinyInteger('fit_score')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_i_driven_learning_recommendations');
    }
};
