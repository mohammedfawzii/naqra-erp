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
        Schema::create('offboarding_process_management', function (Blueprint $table) {
            $table->id();
            $table->enum('exit_type', ['Resignation', 'Termination', 'Retirement'])->default('Resignation');
            $table->date('exit_date')->nullable();
            $table->string('exit_status')->nullable();
            $table->string('exit_document_pdf')->nullable();
            $table->string('exit_log_excel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offboarding_process_management');
    }
};
