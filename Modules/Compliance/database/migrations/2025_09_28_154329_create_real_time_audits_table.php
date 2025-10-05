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
        Schema::create('real_time_audits', function (Blueprint $table) {
            $table->id();
            $table->enum('audit_type', [
                'Financial',
                'Operational',
                'Compliance',
                'IT',
                'Environmental'
            ]);
            $table->date('start_date'); // تاريخ البدء
            $table->date('end_date');   // تاريخ الانتهاء
            $table->enum('audit_status', ['Pending', 'In Progress', 'Completed', 'Failed']); // حالة التدقيق
            $table->decimal('audit_percentage_score', 5, 2)->nullable(); // نتيجة التدقيق (مثال: 92.50)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_time_audits');
    }
};
