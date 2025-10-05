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
        Schema::create('employee_payment_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('bank_id');
            $table->integer('payment_method_id');
            $table->string('bank_account_number');
            $table->string('iban');
            $table->date('payroll_date');

            $table->integer('payroll_attachments_id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_payment_management');
    }
};
