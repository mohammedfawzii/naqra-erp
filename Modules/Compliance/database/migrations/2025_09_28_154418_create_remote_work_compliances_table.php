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
        Schema::create('remote_work_compliances', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // معرف الموظف  
            $table->enum('compliance_type', ['Security', 'Data Privacy', 'Productivity', 'Policy']); // نوع الامتثال
            $table->enum('compliance_status', ['Compliant', 'Non-Compliant', 'Pending']); // حالة الامتثال
            $table->date('review_date')->nullable(); // تاريخ المراجعة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remote_work_compliances');
    }
};
