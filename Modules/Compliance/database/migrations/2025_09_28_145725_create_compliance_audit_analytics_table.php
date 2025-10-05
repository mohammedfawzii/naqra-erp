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
        Schema::create('compliance_audit_analytics', function (Blueprint $table) {
            $table->id();
            $table->string('time_period'); // الفترة
            $table->decimal('compliance_rate', 5, 2); // معدل الامتثال (مثال: 95.50%)
            $table->integer('audit_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compliance_audit_analytics');
    }
};
