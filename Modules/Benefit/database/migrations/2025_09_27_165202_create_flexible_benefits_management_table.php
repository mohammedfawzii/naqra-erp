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
        Schema::create('flexible_benefits_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id');
            $table->text('selected_benefits')->nullable();
            $table->decimal('benefits_cost', 12, 2)->nullable();
            $table->enum('selection_status', ['Pending', 'Confirmed'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flexible_benefits_management');
    }
};
