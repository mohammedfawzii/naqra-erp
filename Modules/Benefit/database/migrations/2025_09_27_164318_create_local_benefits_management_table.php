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
        Schema::create('local_benefits_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id');
            $table->enum('local_benefit_type', ['Health', 'Retirement', 'Allowance'])->default('Health');
            $table->enum('local_benefit_status', ['Active', 'Inactive'])->default('Active');
            $table->decimal('gosi_contribution')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_benefits_management');
    }
};
