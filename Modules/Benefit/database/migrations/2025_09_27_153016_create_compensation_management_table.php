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
        Schema::create('compensation_management', function (Blueprint $table) {
            $table->id();
            $table->Integer('employeeinfo_id'); 
            $table->enum('compensation_type', ['Salary', 'Bonus', 'Allowance', 'Other'])->default('Salary');
            $table->decimal('compensation_value')->nullable();
            $table->date('issue_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compensation_management');
    }
};
