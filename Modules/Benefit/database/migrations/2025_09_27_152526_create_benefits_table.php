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
        Schema::create('benefits', function (Blueprint $table) {
            $table->id();
            $table->enum('benefit_type', ['Health', 'Retirement', 'Supplemental', 'Flexible'])->default('Health');
            $table->date('enrollment_date')->nullable();
            $table->enum('benefit_status', ['Active', 'Inactive', 'Pending'])->default('Active');
            $table->decimal('benefit_value', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefits');
    }
};
