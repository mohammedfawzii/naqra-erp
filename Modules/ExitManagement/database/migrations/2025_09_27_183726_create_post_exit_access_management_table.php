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
        Schema::create('post_exit_access_management', function (Blueprint $table) {
            $table->id();
            $table->string('access_type');                             // نوع الوصول
            $table->date('access_date')->nullable();                   // تاريخ الوصول
            $table->string('access_status')->nullable();               // حالة الوصول
            $table->string('post_exit_access_report_pdf')->nullable(); // تقرير الوصول PDF
            $table->string('access_policy_excel')->nullable();         // سياسة الوصول Excel

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_exit_access_management');
    }
};
