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
        Schema::create('exit_integration_management', function (Blueprint $table) {
            $table->id();
            $table->string('integration_type');                  // نوع التكامل
            $table->date('integration_date')->nullable();        // تاريخ التكامل
            $table->string('integration_status')->nullable();    // حالة التكامل
            $table->string('exit_integration_document_pdf')->nullable(); // وثيقة التكامل PDF
            $table->string('integration_report_excel')->nullable();      // تقرير التكامل Excel

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_integration_management');
    }
};
