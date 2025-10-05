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
        Schema::create('end_of_service_benefits_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // employee_info id
            $table->integer('service_duration')->nullable();   // مدة الخدمة (بالسنوات)
            $table->date('end_date')->nullable();              // تاريخ النهاية
            $table->decimal('end_of_service_value')->nullable(); // مستحقات النهاية


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('end_of_service_benefits_management');
    }
};
