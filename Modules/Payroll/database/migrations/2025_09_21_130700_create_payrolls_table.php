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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');

            $table->decimal('basic_salary', 10, 2);

            $table->decimal('allowances', 10, 2)->default(0);

            $table->integer('overtime_hours')->default(0);

            $table->decimal('overtime_amount', 10, 2)->default(0);

            $table->decimal('deductions', 10, 2)->default(0);

            $table->decimal('gross_salary', 10, 2);

            $table->decimal('net_salary', 10, 2);

            $table->integer('payment_method_id');

            $table->integer('currency_id');

            $table->date('payment_date');
            $table->integer('payroll_attachments_id');


            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
