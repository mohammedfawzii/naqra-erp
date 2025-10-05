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
        Schema::create('regional_exit_management', function (Blueprint $table) {
            $table->id();
            $table->enum('exit_type', ['Resignation', 'Retirement', 'Termination'])->default('Resignation');
            $table->date('exit_date')->nullable();              // تاريخ الخروج
            $table->string('exit_status')->nullable();          // حالة الخروج
            $table->string('regional_exit_report_pdf')->nullable(); // تقرير الخروج الإقليمي PDF
            $table->string('exit_log_excel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regional_exit_management');
    }
};
