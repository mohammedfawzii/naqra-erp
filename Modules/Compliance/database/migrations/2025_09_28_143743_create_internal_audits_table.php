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
        Schema::create('internal_audits', function (Blueprint $table) {
            $table->id();
            $table->enum('audit_type', ['financial', 'operational', 'compliance', 'it', 'other'])
                ->default('other');               // نوع التدقيق
            $table->date('start_date');             // تاريخ البدء
            $table->date('end_date')->nullable();   // تاريخ الانتهاء
            $table->enum('audit_status', ['pending', 'in_progress', 'completed', 'failed'])
                ->default('pending');             // حالة التدقيق
            $table->decimal('audit_percentage_score', 5, 2)->nullable(); // نتيجة التدقيق (0.00 - 100.00)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_audits');
    }
};
