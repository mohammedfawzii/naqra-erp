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
        Schema::create('automated_exit_communication_management', function (Blueprint $table) {
            $table->id();
            $table->string('communication_type');                        // نوع التواصل
            $table->date('communication_date')->nullable();              // تاريخ التواصل
            $table->string('communication_status')->nullable();          // حالة التواصل
            $table->string('automated_exit_communication_template_pdf')->nullable(); // نموذج التواصل PDF
            $table->string('communication_log_excel')->nullable();       // سجل التواصل Excel

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automated_exit_communication_management');
    }
};
