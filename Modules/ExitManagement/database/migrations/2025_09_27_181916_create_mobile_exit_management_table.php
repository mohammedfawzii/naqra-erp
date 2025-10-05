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
        Schema::create('mobile_exit_management', function (Blueprint $table) {
            $table->id();
            $table->enum('exit_type', ['Resignation', 'Retirement', 'Termination'])->default('Resignation');
            $table->date('exit_date')->nullable();           // تاريخ الخروج
            $table->string('exit_status')->nullable();       // حالة الخروج
            $table->string('mobile_exit_report_pdf')->nullable(); // تقرير الخروج المتنقل PDF
            $table->string('exit_screenshot_png')->nullable();    // لقطة الشاشة PNG
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_exit_management');
    }
};
