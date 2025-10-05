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
        Schema::create('exit_compliance_management', function (Blueprint $table) {
            $table->id();
            $table->enum('compliance_type', ['Policy', 'Regulation', 'Procedure'])->default('Policy');
            $table->enum('compliance_status', ['Pending', 'Reviewed', 'Approved'])->nullable()->default('Pending');
            $table->date('review_date')->nullable();            // تاريخ المراجعة
            $table->string('exit_compliance_report_pdf')->nullable(); // تقرير الامتثال PDF
            $table->string('compliance_policy_excel')->nullable();    // ملف سياسة الامتثال Excel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_compliance_management');
    }
};
