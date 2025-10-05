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
        Schema::create('benefit_employees', function (Blueprint $table) {
            $table->id();
             $table->integer('employee_id');
            $table->integer('benefit_types_id');
            $table->decimal('amount', 10, 2)->default(0);
            $table->date('start_date')->nullable();

            $table->integer('payroll_attachments_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefit_employees');
    }
};
