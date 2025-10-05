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
        Schema::create('exit_survey_management', function (Blueprint $table) {
            $table->id();
            $table->integer('survey_id');
            $table->enum('survey_type', ['Resignation', 'Retirement', 'Termination'])->default('Resignation');
            $table->date('survey_date')->nullable();
            $table->decimal('satisfaction_rate', 5, 2)->nullable();
            $table->string('exit_survey_report_pdf')->nullable();
            $table->string('malakite')->nullable();
            $table->string('survey_log_excel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_survey_management');
    }
};
