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
        Schema::create('feedback360s', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id');
            $table->string('evaluator_name');
            $table->string('evaluator_designation')->nullable();
            $table->decimal('rating');
            $table->text('comment')->nullable();
            $table->string('source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback360s');
    }
};
