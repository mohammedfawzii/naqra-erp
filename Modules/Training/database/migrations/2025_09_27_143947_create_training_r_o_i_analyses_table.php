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
        Schema::create('training_r_o_i_analyses', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id'); // course id
            $table->decimal('program_cost', 12, 2)->default(0);
            $table->decimal('roi', 8, 2)->default(0);
            $table->text('performance_impact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_r_o_i_analyses');
    }
};
