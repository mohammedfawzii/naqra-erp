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
        Schema::create('paid_leave_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('holidays_lists_id');
            $table->decimal('leave_balance', 8, 2)->default(0);
            $table->date('leave_date');
            $table->integer('payroll_attachments_id');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paid_leave_management');
    }
};
