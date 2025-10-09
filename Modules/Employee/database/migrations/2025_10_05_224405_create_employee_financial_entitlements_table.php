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
        Schema::create('employee_financial_entitlements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');

            $table->decimal('basic_salary', 10, 2)->nullable();
            $table->unsignedBigInteger('salary_type_id')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->string('iban', 34)->nullable();
            $table->string('cost_center')->nullable();
            $table->string('salary_payment_method')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->integer('employee_attachments_id')->nullable();

            $table->timestamps();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');

            $table->foreign('salary_type_id')
                ->references('id')
                ->on('salary_types')
                ->onDelete('set null');

            $table->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onDelete('set null');

            $table->foreign('bank_id')
                ->references('id')
                ->on('banks')
                ->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_financial_entitlements');
    }
};
