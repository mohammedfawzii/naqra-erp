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
        Schema::create('training_needs_assessments', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id');
             $table->text('needs');
            $table->enum('needs_priority', ['high', 'medium', 'low'])
                  ->default('medium');
            $table->string('needs_source')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_needs_assessments');
    }
};
