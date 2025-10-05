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
        Schema::create('variable_compensation_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id');
            $table->enum('variable_type', ['Bonus', 'Commission', 'Incentive'])->default('Bonus');
            $table->decimal('variable_value');
            $table->date('evaluation_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variable_compensation_management');
    }
};
