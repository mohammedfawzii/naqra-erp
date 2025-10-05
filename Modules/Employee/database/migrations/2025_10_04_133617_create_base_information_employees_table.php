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
        Schema::create('base_information_employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('avatar')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('job_title')->nullable();

            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();

            $table->date('start_hire')->nullable();
            $table->date('end_hire')->nullable();
            $table->date('retirement_date')->nullable();

            $table->unsignedBigInteger('notice_period_id')->nullable();
            $table->unsignedBigInteger('trial_period_id')->nullable();

            $table->unsignedBigInteger('direct_manager_id')->nullable();
            $table->unsignedBigInteger('holiday_manager_id')->nullable();
            $table->unsignedBigInteger('salary_manager_id')->nullable();

            $table->enum('status', ['hire', 'fire', 'retirement', 'contract_end'])->default('hire');

            $table->timestamps();
            
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('direct_manager_id')->references('id')->on('employees')->onDelete('set null');
            $table->foreign('holiday_manager_id')->references('id')->on('employees')->onDelete('set null');
            $table->foreign('salary_manager_id')->references('id')->on('employees')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_information_employees');
    }
};
