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
        Schema::create('benefits_compliance_management', function (Blueprint $table) {
            $table->id();
            $table->enum('compliance_type', ['Policy', 'Regulation', 'Standard'])->default('Policy');
            $table->enum('compliance_status', ['Compliant', 'Non-Compliant', 'Pending'])->default('Pending');
            $table->date('review_date')->nullable();        // تاريخ المراجعة
            $table->text('compliance_report')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefits_compliance_management');
    }
};
