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
        Schema::create('rehire_management', function (Blueprint $table) {
            $table->id();
              $table->string('rehire_type');                        // نوع التوظيف
    $table->date('rehire_date')->nullable();              // تاريخ التوظيف
    $table->string('rehire_status')->nullable();          // حالة التوظيف
    $table->text('rehire_reason')->nullable();            // سبب إعادة التوظيف
    $table->string('rehire_document_pdf')->nullable();    // وثيقة التوظيف PDF
    $table->string('rehire_log_excel')->nullable();       // سجل التوظيف Excel
   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rehire_management');
    }
};
