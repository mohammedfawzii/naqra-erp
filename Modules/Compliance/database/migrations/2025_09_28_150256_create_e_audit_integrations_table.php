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
        Schema::create('e_audit_integrations', function (Blueprint $table) {
            $table->id();
            $table->string('integration_type'); // نوع التكامل
            $table->enum('integration_status', ['Pending', 'Active', 'Failed', 'Completed']); // حالة التكامل
            $table->date('integration_date'); // تاريخ التكامل
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_audit_integrations');
    }
};
