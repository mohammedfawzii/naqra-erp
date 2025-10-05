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
        Schema::create('tax_deductions', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('tax_deduction_types_id');
            $table->decimal('amount', 10, 2);
            $table->date('deduction_date');
            $table->integer('tax_deduction_statuses_id');
            $table->integer('payroll_attachments_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_deductions');
    }
};
